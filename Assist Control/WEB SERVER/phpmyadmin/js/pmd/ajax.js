function makeRequest(b,c){var a=PMA_ajaxShowMessage();$.post(b,c,function(d){PMA_ajaxRemoveMessage(a);PrintXML(d)});return true}function PrintXML(c){var j=$(c).find("root");if(j.length==0){var h=window.open("","Report","width=400, height=250, resizable=1, scrollbars=1, status=1");var d=h.document;d.write(c);d.close()}else{if(j.attr("act")=="save_pos"){PMA_ajaxShowMessage(j.attr("return"))}else{if(j.attr("act")=="relation_upd"){PMA_ajaxShowMessage(j.attr("return"));if(j.attr("b")=="1"){contr.splice(j.attr("K"),1);Re_load()}}else{if(j.attr("act")=="relation_new"){PMA_ajaxShowMessage(j.attr("return"));if(j.attr("b")=="1"){var e=contr.length;var g=j.attr("DB1")+"."+j.attr("T1");var b=j.attr("F1");var f=j.attr("DB2")+"."+j.attr("T2");var a=j.attr("F2");contr[e]=[];contr[e][""]=[];contr[e][""][f]=[];contr[e][""][f][a]=[];contr[e][""][f][a][0]=g;contr[e][""][f][a][1]=b;Re_load()}}}}}};