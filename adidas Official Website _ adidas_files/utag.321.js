//tealium universal tag - utag.321 ut4.0.201708150747, Copyright 2017 Tealium.com Inc. All Rights Reserved.
try{(function(id,loader){var u={};utag.o[loader].sender[id]=u;if(utag.ut===undefined){utag.ut={};}
if(utag.ut.loader===undefined){u.loader=function(o){var b,c,l,a=document;if(o.type==="iframe"){b=a.createElement("iframe");o.attrs=o.attrs||{"height":"1","width":"1","style":"display:none"};for(l in utag.loader.GV(o.attrs)){b.setAttribute(l,o.attrs[l]);}b.setAttribute("src",o.src);}else if(o.type=="img"){utag.DB("Attach img: "+o.src);b=new Image();b.src=o.src;return;}else{b=a.createElement("script");b.language="javascript";b.type="text/javascript";b.async=1;b.charset="utf-8";for(l in utag.loader.GV(o.attrs)){b[l]=o.attrs[l];}b.src=o.src;}if(o.id){b.id=o.id};if(typeof o.cb=="function"){if(b.addEventListener){b.addEventListener("load",function(){o.cb()},false);}else{b.onreadystatechange=function(){if(this.readyState=='complete'||this.readyState=='loaded'){this.onreadystatechange=null;o.cb()}};}}l=o.loc||"head";c=a.getElementsByTagName(l)[0];if(c){utag.DB("Attach to "+l+": "+o.src);if(l=="script"){c.parentNode.insertBefore(b,c);}else{c.appendChild(b)}}}}else{u.loader=utag.ut.loader;}
if(utag.ut.typeOf===undefined){u.typeOf=function(e){return({}).toString.call(e).match(/\s([a-zA-Z]+)/)[1].toLowerCase();};}else{u.typeOf=utag.ut.typeOf;}
u.ev={"view":1};u.queue=[];u.map={"clicktale_guid":"project_guid"};u.extend=[function(a,b){try{if(1){if(a=='view'&&b.page_name=='PRODUCT LAUNCH CALENDAR'&&b.page_type=='STACK'){return false;}}}catch(e){utag.DB(e)}},function(a,b,c,d,e,f,g){d=b['region'];if(typeof d=='undefined')return;c=[{'eu':'83b57dd7-c3f8-4358-a3a5-a6f5e97fef70:83b57dd7-c3f8-4358-a3a5-a6f5e97fef70:d1eb2456-bf7f-497e-a6db-086e9b2c8ef7'},{'us':'d0196753-0312-4934-9635-e3b49d47a5a6:796e46a3-998b-4341-b982-d0261ed94f96:7753b341-d3f7-40c3-879b-c6b8a4b79b5f'}];var m=false;for(e=0;e<c.length;e++){for(f in c[e]){if(d==f){b['clicktale_guid']=c[e][f];m=true};};if(m)break};if(!m)b['clicktale_guid']='';},function(a,b){if(b.clicktale_guid){var envs=b.clicktale_guid.split(':');if(b.environment=='PRODUCTION'){b.clicktale_guid=envs[0];}else if(b.environment=='STAGING'&&b.glass_version!=null){b.clicktale_guid=envs[1];}else{b.clicktale_guid=envs[2];}}},function(a,b){u.trigger_clicktale_recording=function(){if(typeof clickTaleStartEventSignal==='function'&&(b['ut.env']!='prod'||b.environment!='PRODUCTION')){console.log('CLICKTALE: start event signal');window['clickTaleStartEventSignal'](b.analytics_pagename);}}},function(a,b){if(b['analytics_pagename']=='CHECKOUT|CONFIRMATION'&&a=='view'){return false;}}];u.send=function(a,b){if(u.ev[a]||u.ev.all!==undefined){var c,d,e,f;u.data={"base_url":"","partition":"www06","project_guid":"83b57dd7-c3f8-4358-a3a5-a6f5e97fef70","ptc":"/ptc/","events":[]};for(c=0;c<u.extend.length;c++){try{d=u.extend[c](a,b);if(d==false)return}catch(e){if(typeof utag_err!='undefined'){utag_err.push({e:'extension error:'+e,s:utag.cfg.path+'utag.'+id+'.js',l:c,t:'ex'})}}};c=[];for(d in utag.loader.GV(u.map)){if(b[d]!==undefined&&b[d]!==""){e=u.map[d].split(",");for(f=0;f<e.length;f++){if(e[f].indexOf("event")===0){u.data.events.push(b[d]);}else{u.data[e[f]]=b[d];}}}}
u.loader_cb=function(){if(u.data.events.length>0&&typeof ClickTaleEvent==="function"){for(i=0;i<u.data.events.length;i++){ClickTaleEvent(u.data.events[i]);}}
if(a=='view'&&u.initialized&&typeof(u.trigger_clicktale_recording)=='function'){u.trigger_clicktale_recording();}};u.callBack=function(){var data={};while(data=u.queue.shift()){u.data=data.data;u.loader_cb();u.initialized=true;}};if(u.initialized){u.loader_cb();}else{u.queue.push({"data":u.data});if(!u.scriptrequested){u.scriptrequested=true;u.data.base_url=u.data.base_url||(((document.location.protocol==="https:")?"https://cdnssl.clicktale.net/":"http://cdn.clicktale.net/")+u.data.partition+u.data.ptc+u.data.project_guid+".js");u.loader({"type":"script","src":u.data.base_url,"cb":u.callBack,"loc":"script","id":"utag_321"});}}
}};utag.o[loader].loader.LOAD(id);}("321","adidas.adidasglobal"));}catch(error){utag.DB(error);}
