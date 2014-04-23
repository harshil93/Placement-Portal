/* -*- Mode:C++; c-file-style:"gnu"; indent-tabs-mode:nil; -*- */
/*
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License version 2 as
 * published by the Free Software Foundation;
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 */

/*
	LAB Assignment #2
	1. n0 starts CBR traffic at time 1.0 of rate 900 Kbps destined for n2.
	
	2. n0 starts another CBR traffic at time 1.5 of rate 300 Kbps destined for node n1.
	
	3. At time 2.0, link from n0 to n1 goes down. Use a dynamic routing protocol so that path n0-n3-n2 is used now.

	4. At time 2.7, link n0-n1 comes up again. 
	
	5. At time 3.0, CBR traffic destined for node n1 stops. 
	
	6. CBR destined for n2 stops at time 3.5. 
	
	7. Use a  Flow monitor to monitor losses at n2.
	
	8. Draw a graph of percentage loss as a function of time for the duration of simulation. 
	
	9. Give an explanation for results you find.

	Solution by: Anil Kag (anilkagak2@gmail.com)
*/

// Network topology
//
//		1Mbps	      1Mbps
//       n0 ------------ n1 --------- n2 Flow Monitor
//	    \			    /
//	     \ 1Mbps		   / 1Mbps
//	      \			  /
//	       n3 ------------- n4
//	            500Kbps
//

#include <iostream>
#include <fstream>
#include <string>
#include "ns3/core-module.h"
#include "ns3/network-module.h"
#include "ns3/point-to-point-module.h"
#include "ns3/applications-module.h"
#include "ns3/internet-module.h"
#include "ns3/flow-monitor-module.h"
#include "ns3/ipv4-global-routing-helper.h"

using namespace std;
using namespace ns3;

NS_LOG_COMPONENT_DEFINE ("DynamicRoutingProtocol");

ofstream fp;
FlowMonitorHelper flowmon;
Ptr<FlowMonitor> monitor;

uint32_t txPacketsum = 1; 
uint32_t rxPacketsum = 1; 
uint32_t DropPacketsum = 0; 
uint32_t LostPacketsum = 0; 
double Delaysum = 0; 

void calculateLoss (FlowMonitorHelper helper,Ptr<FlowMonitor> monitor) {
  double total=0;
  
  monitor->CheckForLostPackets ();
  Ptr<Ipv4FlowClassifier> classifier = DynamicCast<Ipv4FlowClassifier> (helper.GetClassifier ());
  map<FlowId, FlowMonitor::FlowStats> stats = monitor->GetFlowStats ();
  
  map<FlowId, FlowMonitor::FlowStats>::const_iterator i;
  double j=0,m=0;
  for ( i = stats.begin (); i != stats.end (); ++i)
  {		
     Ipv4FlowClassifier::FiveTuple t = classifier->FindFlow (i->first);
      if(t.destinationAddress == "10.1.2.2")
      {
        j += i->second.txPackets;
        m += i->second.lostPackets;
      }
  }
  total = m/j ;
  fp << Simulator::Now ().GetSeconds () <<" "<< total << endl;
}

int main (int argc, char *argv[])
{
  string latency = "2ms";
  string rate = "1Mbps"; // for all P2P links except n3-n4
  string n3_n4rate = "500Kbps"; // n3n4 P2P link
  bool enableFlowMonitor = false;

  fp.open ("assign-2-loss.txt");
  if (!fp) {
    cout << "Cannot open the output file" << endl;
    exit (1);
  }

  // The below value configures the default behavior of global routing.
  // By default, it is disabled.  To respond to interface events, set to true
  Config::SetDefault ("ns3::Ipv4GlobalRouting::RespondToInterfaceEvents", BooleanValue (true));

  CommandLine cmd;
  cmd.AddValue ("latency", "P2P link Latency in miliseconds", latency);
  cmd.AddValue ("rate", "P2P data rate in bps", rate);
  cmd.AddValue ("n3_n4rate", "P2P data rate for n3-n4 link in bps", n3_n4rate);
  cmd.AddValue ("EnableMonitor", "Enable Flow Monitor", enableFlowMonitor);

  cmd.Parse (argc, argv);

  /* Explicitly create the nodes required by the topology (shown above). */
  NS_LOG_INFO ("Create nodes.");
  NodeContainer nodes; // ALL Nodes
  nodes.Create(5);

  NodeContainer n0n3 = NodeContainer (nodes.Get (0), nodes.Get (3));
  NodeContainer n0n1 = NodeContainer (nodes.Get (0), nodes.Get (1));
  NodeContainer n1n2 = NodeContainer (nodes.Get (1), nodes.Get (2));
  NodeContainer n2n4 = NodeContainer (nodes.Get (2), nodes.Get (4));
  NodeContainer n3n4 = NodeContainer (nodes.Get (3), nodes.Get (4));

  /* Install Internet Stack */
  InternetStackHelper stack;
  stack.Install (nodes);

  /* We create the channels first without any IP addressing information */
  NS_LOG_INFO ("Create channels.");
  PointToPointHelper p2p;
  p2p.SetDeviceAttribute ("DataRate", StringValue (rate));
  p2p.SetChannelAttribute ("Delay", StringValue (latency));
  NetDeviceContainer d0d3 = p2p.Install (n0n3);
  NetDeviceContainer d0d1 = p2p.Install (n0n1);
  NetDeviceContainer d1d2 = p2p.Install (n1n2);
  NetDeviceContainer d2d4 = p2p.Install (n2n4);
  
  p2p.SetDeviceAttribute ("DataRate", StringValue (n3_n4rate));
  NetDeviceContainer d3d4 = p2p.Install (n3n4);

  /* Add IP addresses. */
  NS_LOG_INFO ("Assign IP Addresses.");
  Ipv4AddressHelper ipv4;
  ipv4.SetBase ("10.1.1.0", "255.255.255.0");
  Ipv4InterfaceContainer i0i3 = ipv4.Assign (d0d3);

  ipv4.SetBase ("10.1.2.0", "255.255.255.0");
  Ipv4InterfaceContainer i0i1 = ipv4.Assign (d0d1);

  ipv4.SetBase ("10.1.3.0", "255.255.255.0");
  Ipv4InterfaceContainer i1i2 = ipv4.Assign (d1d2);

  ipv4.SetBase ("10.1.4.0", "255.255.255.0");
  Ipv4InterfaceContainer i2i4 = ipv4.Assign (d2d4);

  ipv4.SetBase ("10.1.5.0", "255.255.255.0");
  Ipv4InterfaceContainer i3i4 = ipv4.Assign (d3d4);

  NS_LOG_INFO ("Enable static global routing.");
  /* Turn on global static routing so we can actually be routed across the network. */
  Ipv4GlobalRoutingHelper::PopulateRoutingTables ();

  NS_LOG_INFO ("Create Applications.");


  /* This snippet of the code is taken from ns-3/examples/wireless/wifi-hidden-terminal.cc  */
  /* OnOffHelper for generating the CBR (Constant Bit Rate) Traffic */
  ApplicationContainer cbrApps;
  uint16_t cbrPort = 12345;
  OnOffHelper onoff ("ns3::UdpSocketFactory",  InetSocketAddress (i1i2.GetAddress (1), cbrPort));
  onoff.SetAttribute ("OnTime",  StringValue ("ns3::ConstantRandomVariable[Constant=1]"));
  onoff.SetAttribute ("OffTime", StringValue ("ns3::ConstantRandomVariable[Constant=0]"));
  onoff.SetAttribute ("PacketSize", UintegerValue (200));

  // flow n0 to n2 at 1sec 900Kbps
  onoff.SetAttribute ("DataRate", StringValue ("900Kbps"));
  onoff.SetAttribute ("StartTime", TimeValue (Seconds (1.000000)));
  onoff.SetAttribute ("StopTime", TimeValue (Seconds (3.500000)));
  cbrApps.Add (onoff.Install (nodes.Get (0)));

  // flow n0 to n1 at 1.5sec 300Kbps
  onoff.SetAttribute ("DataRate", StringValue ("300Kbps"));
  onoff.SetAttribute ("StartTime", TimeValue (Seconds (1.500000)));
  onoff.SetAttribute ("StopTime", TimeValue (Seconds (3.000000)));
  onoff.SetAttribute ("Remote",  AddressValue (Address (InetSocketAddress (i0i1.GetAddress (0), cbrPort))) );
  cbrApps.Add (onoff.Install (nodes.Get (1)));

  // we also use separate UDP applications that will send a single
  // packet before the CBR flows start. 
  // This is a workround for the lack of perfect ARP, see Bug 187
  // http://www.nsnam.org/bugzilla/show_bug.cgi?id=187
  uint16_t  echoPort = 9;

  // ping for n0 to n1
  UdpEchoClientHelper echoClientHelper (i0i1.GetAddress (1), echoPort);
  echoClientHelper.SetAttribute ("MaxPackets", UintegerValue (1));
  echoClientHelper.SetAttribute ("Interval", TimeValue (Seconds (0.1)));
  echoClientHelper.SetAttribute ("PacketSize", UintegerValue (10));
  ApplicationContainer pingApps;
     
  // again using different start times to workaround Bug 388 and Bug 912
  echoClientHelper.SetAttribute ("StartTime", TimeValue (Seconds (0.001)));
  pingApps.Add (echoClientHelper.Install (nodes.Get (0))); 

  // ping for n0 to n2
  echoClientHelper.SetAttribute ("RemoteAddress", AddressValue (i1i2.GetAddress (1)) );
  echoClientHelper.SetAttribute ("RemotePort", UintegerValue (echoPort));
  echoClientHelper.SetAttribute ("StartTime", TimeValue (Seconds (0.006)));
  pingApps.Add (echoClientHelper.Install (nodes.Get (0)));


  // Get the IPv4 pointer of node 1, so as to schedule the setDown link
  Ptr<Node> n1 = nodes.Get (1);
  Ptr<Ipv4> ipv41 = n1->GetObject<Ipv4> ();
  // The first ifIndex is 0 for loopback, then the first p2p (n0-n1) is numbered 1,
  // then the next p2p (n1-n2) is numbered 2
  uint32_t ipv4ifIndex1 = 1;

  Simulator::Schedule (Seconds (2.0), &Ipv4::SetDown, ipv41, ipv4ifIndex1);
  Simulator::Schedule (Seconds (2.7), &Ipv4::SetUp, ipv41, ipv4ifIndex1);

  // Increase UDP Rate
  //  Simulator::Schedule (Seconds(30.0), &IncRate, app2, DataRate("500kbps"));

  /* Tracing */
  AsciiTraceHelper ascii;
  Ptr<OutputStreamWrapper> stream = ascii.CreateFileStream ("dynamic-global-routing.tr");
  p2p.EnableAsciiAll (stream);

  stack.EnableAsciiIpv4All (stream);
  p2p.EnablePcapAll("DynamicRoutingProtocol");

  // Flow Monitor
    if (enableFlowMonitor)
    {
      monitor = flowmon.InstallAll ();
      //monitor = flowmon.Install (nodes.Get (0));
      monitor->Start (Seconds (0.5));
    }

  for(double k=1;k<=4.0;k = k + 0.05)
  { 
    Simulator::Schedule (Seconds(k), &calculateLoss);
  }

  /* Now, do the actual simulation. */
  NS_LOG_INFO ("Run Simulation.");
  Simulator::Stop (Seconds(8.0));
  Simulator::Run ();

  if (enableFlowMonitor)
    {
	  monitor->CheckForLostPackets ();
 // 10. Print per flow statistics
	  Ptr<Ipv4FlowClassifier> classifier = DynamicCast<Ipv4FlowClassifier> (flowmon.GetClassifier ());
	  std::map<FlowId, FlowMonitor::FlowStats> stats = monitor->GetFlowStats ();
	  for (std::map<FlowId, FlowMonitor::FlowStats>::const_iterator i = stats.begin (); i != stats.end (); ++i)
	    {

	      // first 2 FlowIds are for ECHO apps, we don't want to display them
	      if (i->first > 2)
	        {
		              Ipv4FlowClassifier::FiveTuple t = classifier->FindFlow (i->first);
                  if(t.destinationAddress == "10.1.2.2")
                  {
                    txPacketsum += i->second.txPackets; 
                    rxPacketsum += i->second.rxPackets; 
                    LostPacketsum += i->second.lostPackets; 
                    DropPacketsum += i->second.packetsDropped.size(); 
                    Delaysum += i->second.delaySum.GetSeconds(); 
                  }
	        }
	    }
		cout << "  All Tx Packets: " << txPacketsum << "\n"; 
        	cout << "  All Rx Packets: " << rxPacketsum << "\n"; 
	        cout << "  All Delay: " << Delaysum / txPacketsum << "\n"; 
	        cout << "  All Lost Packets: " << LostPacketsum << "\n"; 
	        cout << "  All Drop Packets: " << DropPacketsum << "\n"; 
	        cout << "  Packets Delivery Ratio: " << ((rxPacketsum * 100) / txPacketsum) << "%" << "\n"; 
	        cout << "  Packets Lost Ratio: " << ((LostPacketsum * 100) / txPacketsum) << "%" << "\n"; 
	monitor->SerializeToXmlFile("assign-2.flowmon", true, true);
    }

  Simulator::Destroy ();
  NS_LOG_INFO ("Done.");
}
