<?php
#
# Copyright (c) 2009 Gerhard Lausser (gerhard.lausser@consol.de)
# Plugin: check_apachestatus_auto (http://www.spreendigital.de/blog/nagios/?#check_apachestatus_auto)
# Release 1.0 2009-07-14
#
# This is a template for the visualisation addon PNP (http://www.pnp4nagios.org)
#

$defcnt = 1;

$colors['idle'] = "32CD32";
$colors['busy'] = "FF4500";

$colors['slots'] = "000000";
$colors['open'] = "008000";

$colors['reqpersec'] = "008000";
$colors['bytespersec'] = "008000";

foreach ($DS as $i) {
    $warning = ($WARN[$i] != "") ? $WARN[$i] : "";
    $warnmin = ($WARN_MIN[$i] != "") ? $WARN_MIN[$i] : "";
    $warnmax = ($WARN_MAX[$i] != "") ? $WARN_MAX[$i] : "";
    $critical = ($CRIT[$i] != "") ? $CRIT[$i] : "";
    $critmin = ($CRIT_MIN[$i] != "") ? $CRIT_MIN[$i] : "";
    $critmax = ($CRIT_MAX[$i] != "") ? $CRIT_MAX[$i] : "";
    $minimum = ($MIN[$i] != "") ? $MIN[$i] : "";
    $maximum = ($MAX[$i] != "") ? $MAX[$i] : "";

    if(preg_match('/^Idle$/', $NAME[$i])) {
        $ds_name[$defcnt] = "Busy/Idle";
        $opt[$defcnt] = "--vertical-label \"workers\" --title \"Busy and Idle Workers\" ";
        $def[$defcnt] = "";
        $def[$defcnt] .= "DEF:idle=$rrdfile:$DS[$i]:AVERAGE:reduce=LAST " ;
        $def[$defcnt] .= "AREA:idle#".$colors['idle'].":\" \" ";
        $def[$defcnt] .= "VDEF:vidle=idle,LAST " ;
        $def[$defcnt] .= "GPRINT:vidle:\"is %.0lf idle workers \" " ;
        foreach ($DS as $j) {
          if(preg_match('/^Busy$/', $NAME[$j])) {
            $def[$defcnt] .= "DEF:busy=$rrdfile:$DS[$j]:AVERAGE:reduce=LAST " ;
            $def[$defcnt] .= "AREA:busy#".$colors['busy'].":\" \" ";
            $def[$defcnt] .= "VDEF:vbusy=busy,LAST " ;
            $def[$defcnt] .= "GPRINT:vbusy:\"is %.0lf busy workers \" " ;
          }
        }
        $defcnt++;
    }
    if(preg_match('/^Slots$/', $NAME[$i])) {
        $ds_name[$defcnt] = "Slots";
        $opt[$defcnt] = "--vertical-label \"slots\" --title \"Slots and OpenSlots\" ";
        $def[$defcnt] = "";
        $def[$defcnt] .= "DEF:slots=$rrdfile:$DS[$i]:AVERAGE:reduce=LAST " ;
        $def[$defcnt] .= "AREA:slots#".$colors['slots'].":\" \" ";
        $def[$defcnt] .= "VDEF:vslots=slots,LAST " ;
        $def[$defcnt] .= "GPRINT:vslots:\"is %.0lf slots \" " ;
        foreach ($DS as $j) {
          if(preg_match('/^OpenSlots$/', $NAME[$j])) {
            $def[$defcnt] .= "DEF:open=$rrdfile:$DS[$j]:AVERAGE:reduce=LAST " ;
            $def[$defcnt] .= "AREA:open#".$colors['open'].":\" \" ";
            $def[$defcnt] .= "VDEF:vopen=open,LAST " ;
            $def[$defcnt] .= "GPRINT:vopen:\"is %.0lf open slots \" " ;
          }
        }
        $defcnt++;
    }
    if(preg_match('/^ReqPerSec$/', $NAME[$i])) {
        $ds_name[$defcnt] = "Requests per Second";
        $opt[$defcnt] = "--vertical-label \"req/s\" --title \"Requests per Second\" ";
        $def[$defcnt] = ""; 
        $def[$defcnt] .= "DEF:reqpersec=$rrdfile:$DS[$i]:AVERAGE:reduce=LAST " ; 
        $def[$defcnt] .= "LINE2:reqpersec#".$colors['reqpersec'].":\" \" ";
        $def[$defcnt] .= "VDEF:vreqpersec=reqpersec,LAST " ; 
        $def[$defcnt] .= "GPRINT:vreqpersec:\"is %.2lf requests / s \" " ; 
        $defcnt++;
    }
    if(preg_match('/^BytesPerSec$/', $NAME[$i])) {
        $ds_name[$defcnt] = "Bytes per Second";
        $opt[$defcnt] = "--vertical-label \"b/s\" --title \"Bytes per Second\" ";
        $def[$defcnt] = "";
        $def[$defcnt] .= "DEF:bytespersec=$rrdfile:$DS[$i]:AVERAGE:reduce=LAST " ;
        $def[$defcnt] .= "LINE2:bytespersec#".$colors['bytespersec'].":\" \" ";
        $def[$defcnt] .= "VDEF:vbytespersec=bytespersec,LAST " ;
        $def[$defcnt] .= "GPRINT:vbytespersec:\"is %.2lf bytes / s \" " ;  
        $defcnt++;
    }
}













