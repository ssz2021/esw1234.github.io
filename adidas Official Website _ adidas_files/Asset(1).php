(void 0===window.QSI.Slider||window.QTest)&&(QSI.Slider=QSI.util.Creative(QSI.BuildElementModule,{pos:{B:"bottom",T:"top",L:"left",R:"right",BL:"bottomleft",TL:"topleft",BR:"bottomright",TR:"topright"},anchor:{T:"top",B:"bottom"},shadowPadding:20,initialize:function(a){this.globalInitialize(a),this.elements=a.elements.Elements||[],this.targetType=a.targetType,this.state="in",this.removed=!1,this.minTop=a.elements.MinTop,this.minLeft=a.elements.MinLeft,this.hasCreativeEmbeddedTarget=a.hasCreativeEmbeddedTarget;var b=this;this.userOpened=!1,this.userClosed=!1,QSI.util.processLocators(this.elements),this.shouldShow()&&(this.auto=!0,(this.displayOptions.hasVisibleControl||this.displayOptions.displayOnScroll)&&(this.auto=!1),this.container=this.build(),this.resetStyles(),document.body.appendChild(this.container),this.displayOptions.hasVisibleControl&&QSI.global.featureFlags.deferredSliderLoadingFeatureEnabled&&this.hasCreativeEmbeddedTarget?(this.targetLoaded=!1,QSI.util.when(QSI.util.getTimeout(this.displayOptions.delay)).done(function(){b.removed||(b.display(),b.poppedUp=!0)})):(this.initializeIframes(),this.targetLoaded=!0,QSI.util.when(this.container.loadingDeferred,QSI.util.getTimeout(this.displayOptions.delay)).done(function(){b.display(),b.poppedUp=!0})))},display:function(){var a,b=this;this.resizeHandler=function(){b.resize()},QSI.util.observe(window,"resize",this.resizeHandler),QSI.util.observe(window,"touchend",this.resizeHandler);var c=window.pageYOffset;if(this.moveBack=!1,this.positionHandler=function(){b.moveBack===!0?(window.scrollTo(0,c),b.moveBack=!1):(c=window.pageYOffset,window.scrollTo(0,0),b.moveBack=!0)},"Safari"==QSI.Browser.name&&QSI.Browser.isMobile&&this.displayOptions.hasVisibleControl&&QSI.util.observe(this.container,"click",this.positionHandler),this.refreshAnimationPositions(),this.auto)a=this.slideOut();else{if(this.displayOptions.hasVisibleControl){this.buildControl();var d=this.getAnimationPositions().start,e=d.x,f=d.y;d=this.animationPosition.start,a=QSI.Animation.animateStyle(this.container,{from:{top:f,left:e},to:{top:d.y,left:d.x}},200,"easeto")}this.displayOptions.displayOnScroll&&QSI.util.observe(window,"scroll",function(){b.handlingScroll||(b.handlingScroll=!0,b.handleScroll())})}var g=function(){b.displayOptions.close&&parseInt(b.displayOptions.close,10)>0&&QSI.util.getTimeout(b.displayOptions.close).done(function(){b.close(!0)})};a?(a.done(function(){b.displayed.resolve()}),a.done(g)):(g(),this.displayed.resolve())},refreshAnimationPositions:function(){if(this.animationPosition=this.getAnimationPositions(),this.displayOptions.hasVisibleControl){var a=this.animationPosition.start,b=parseInt(this.displayOptions.controlSize,10),c=b+this.shadowPadding;switch(this.animationPosition.curPos){case this.pos.B:a.y-=c;break;case this.pos.T:a.y+=c;break;case this.pos.L:a.x+=c;break;case this.pos.R:a.x-=c;break;case this.pos.TL:a.x+=c,a.y+=c;break;case this.pos.TR:a.x-=c,a.y+=c;break;case this.pos.BL:a.x+=c,a.y-=c;break;case this.pos.BR:a.x-=c,a.y-=c}}},slideOut:function(){var a=this;if("in"==this.state&&!this.sliding){if(!this.targetLoaded&&this.displayOptions.hasVisibleControl&&QSI.global.featureFlags.deferredSliderLoadingFeatureEnabled){var b=this.container.getElementsByClassName("scrollable")[0];if(b&&this.hasCreativeEmbeddedTarget){var c=75,d=parseInt(b.style.height,10),e=parseInt(b.style.width,10),f=d/2-c/2,g=e/2-c/2,h=new QSI.LoadingAnimationElement,i=h.buildAnimation(c,f,g);b.appendChild(i),h.startAnimation(100),this.initializeIframes(),this.targetLoaded=!0,QSI.util.when(this.container.loadingDeferred).done(function(){h.stopAnimation()})}}this.sliding=!0;var j=this.animationPosition.start,k=this.animationPosition.end;return this.state="out",this.impressed||(this.impress(),this.impressed=!0),QSI.Animation.animateStyle(this.container,{from:{top:j.y,left:j.x},to:{top:k.y,left:k.x}},400,"easeto").done(function(){a.sliding=!1})}},slideIn:function(){var a=this;if("out"==this.state&&!this.sliding){this.sliding=!0;var b=this.animationPosition.start;return this.state="in",QSI.Animation.animateStyle(this.container,{top:b.y,left:b.x},400,"easeto").done(function(){a.sliding=!1})}},buildControl:function(){var a={},b=this.displayOptions.controlSize,c=this;switch(this.animationPosition.curPos){case this.pos.B:a={width:this.controlWidth+"px",height:b+"px",left:this.controlLeft+"px",top:"0px"};break;case this.pos.T:a={width:this.controlWidth+"px",height:b+"px",left:this.controlLeft+"px",top:this.height-b+"px"};break;case this.pos.L:a={height:this.controlHeight+"px",width:b+"px",left:this.width-b+"px",top:this.controlTop+"px"};break;case this.pos.R:a={height:this.controlHeight+"px",width:b+"px",left:"0px",top:this.controlTop+"px"};break;case this.pos.TL:a={height:b+"px",width:b+"px",left:this.width-b+"px",top:this.height-b+"px"};break;case this.pos.TR:a={height:b+"px",width:b+"px",left:0,top:this.height-b+"px"};break;case this.pos.BL:a={height:b+"px",width:b+"px",left:this.width-b+"px",top:0};break;case this.pos.BR:a={height:b+"px",width:b+"px",left:0,top:0}}a.cursor="pointer",a.position="absolute",a.zIndex=21e8,a.background="white",a.opacity=0,a.filter="alpha(opacity=0)";var d="slider-control-"+this.id;this.control=QSI.util.build("div",{id:d}),QSI.util.observe(this.control,"click",function(){c.toggleControl()}),QSI.util.setStyle(this.control,a),this.container.appendChild(this.control)},toggleControl:function(){"in"==this.state?(this.slideOut(),this.userOpened=!0,this.userClosed=!1):"out"==this.state&&(this.slideIn(),this.userOpened=!1,this.userClosed=!0)},handleScroll:function(){var a=QSI.util.getScrollOffsets(),b=QSI.util.getScroll().height-QSI.util.getPageSize().height,c=a.top,d=this.displayOptions.pageScrollLength,e=this.displayOptions.pageScrollUnitOfMeasurement,f=this.displayOptions.pageScrollAnchor;c>=0&&b>=c&&!this.userOpened&&!this.userClosed&&("px"==e?f==this.anchor.B&&(d=b-d):(f==this.anchor.B&&(d=100-d),d=b*(d/100)),d>c?this.slideIn():this.slideOut()),this.handlingScroll=!1},build:function(){var a,b,c,d,e,f,g=[],h=0,i=0,j=0,k=2e7,l=0,m=2e7,n=0,o=!1,p=!1,q=!1,r=[];for(this.animationPosition=this.getAnimationPositions(),e=0,f=this.elements.length;f>e;e++)a=this.buildElement(this.elements[e]),a&&a.style&&(a.style.borderWidth&&(j=2*parseInt(a.style.borderWidth,10)),elX=parseInt(a.style.left,10)+parseInt(a.style.width,10)+j,elY=parseInt(a.style.top,10)+parseInt(a.style.height,10)+j,isNaN(elX)||(h=Math.max(h,elX)),isNaN(elY)||(i=Math.max(i,elY)),g.push(a),r.push(a.loadingDeferred));for(this.width=h,this.height=i,e=0,f=g.length;f>e;e++)if(a=g[e],a&&a.style){switch(a.style.borderWidth&&(j=2*parseInt(a.style.borderWidth,10)),o=!1,p=!1,q=!1,this.animationPosition.curPos){case this.pos.B:q=!0,o=parseInt(a.style.top,10)<this.displayOptions.controlSize;break;case this.pos.T:q=!0,o=parseInt(a.style.top,10)+parseInt(a.style.height,10)+j>this.height-this.displayOptions.controlSize;break;case this.pos.L:p=!0,o=parseInt(a.style.left,10)+parseInt(a.style.width,10)+j>this.width-this.displayOptions.controlSize;break;case this.pos.R:p=!0,o=parseInt(a.style.left,10)<this.displayOptions.controlSize}if(o&&p){var s=parseInt(a.style.top,10)+parseInt(a.style.height,10)+j;l=Math.max(l,s),k=Math.min(k,parseInt(a.style.top,10))}else if(o&&q){var t=parseInt(a.style.left,10)+parseInt(a.style.width,10)+j;n=Math.max(n,t),m=Math.min(m,parseInt(a.style.left,10))}}return this.controlWidth=n-m,this.controlHeight=l-k,this.controlTop=k,this.controlBottom=l,this.controlLeft=m,this.controlRight=n,b=Math.floor(1.2*this.width),c=Math.floor(1.2*this.height),d="fixed",QSI.util.isFixed()||(d="absolute"),a=QSI.util.build("div",{className:"QSISlider "+this.id+"_SliderContainer",style:{position:d,top:-c+"px",left:-b+"px",zIndex:"2000000000"}},g),a.loadingDeferred=QSI.util.when.apply(this,r),this.elementNodes=g,a},getAnimationPositions:function(){var a=this.width,b=this.height,c=QSI.util.getPageSize(),d=QSI.util.getScrollOffsets(),e=c.height,f=this.displayOptions.startPosition,g=-a,h=(e-b)/2,i=-a,j=(e-b)/2,k=this.pos.L,l=parseInt(this.displayOptions.xOffset,10),m=parseInt(this.displayOptions.yOffset,10),n=c.width;switch("Internet Explorer"==QSI.Browser.name&&QSI.Browser.version<9&&(n=c.width),f){default:case"OML":g=-a-this.shadowPadding,h=(e-b)/2,i=0,j=h,k=this.pos.L;break;case"OTLL":g=-a-this.shadowPadding,h=0,i=0,j=h,k=this.pos.L;break;case"OTL":g=-a-this.shadowPadding,h=-b-this.shadowPadding,i=0,j=0,k=this.pos.TL;break;case"OTLT":g=0,h=-b-this.shadowPadding,i=g,j=0,k=this.pos.T;break;case"OBLL":g=-a-this.shadowPadding,h=e-b,i=0,j=h,k=this.pos.L;break;case"OBLB":g=0,h=e+this.shadowPadding,j=e-b,i=g,k=this.pos.B;break;case"OTC":g=(n-a)/2,h=-b-this.shadowPadding,i=g,j=0,k=this.pos.T;break;case"OTRR":g=n+this.shadowPadding,h=0,i=n-a,j=h,k=this.pos.R;break;case"OTR":g=n+this.shadowPadding,h=-b-this.shadowPadding,i=n-a,j=0,k=this.pos.TR;break;case"OTRT":g=n-a,h=-b-this.shadowPadding,i=g,j=0,k=this.pos.T;break;case"OMR":g=n+this.shadowPadding,h=(e-b)/2,i=n-a,j=h,k=this.pos.R;break;case"OBRR":g=n+this.shadowPadding,h=e-b,i=n-a,j=h,k=this.pos.R;break;case"OBR":g=n+this.shadowPadding,h=e+this.shadowPadding,i=n-a,j=e-b,k=this.pos.BR;break;case"OBRB":g=n-a,h=e+this.shadowPadding,j=e-b,i=g,k=this.pos.B;break;case"OBC":g=(n-a)/2,h=e+this.shadowPadding,j=e-b,i=g,k=this.pos.B;break;case"OBL":g=-a-this.shadowPadding,h=e+this.shadowPadding,i=0,j=e-b,k=this.pos.BL}switch(k){case this.pos.B:case this.pos.T:i=g+=l;break;case this.pos.R:case this.pos.L:j=h+=m;break;case this.pos.TL:case this.pos.TR:case this.pos.BL:case this.pos.BR:i+=l,j+=m}return QSI.util.isFixed()||(g+=d.left,h+=d.top),{start:{x:g,y:h},end:{x:i,y:j},curPos:k}},getYPosition:function(a){return a.top-this.minTop},getXPosition:function(a){return a.left-this.minLeft},reposition:function(){this.refreshAnimationPositions();var a=this.animationPosition.start,b=this.animationPosition.end;"in"==this.state?(this.container.style.left=a.x+"px",this.container.style.top=a.y+"px"):"out"==this.state&&(this.container.style.left=b.x+"px",this.container.style.top=b.y+"px")},resize:function(){this.resizeElements();var a=this.getContainerDimensions();this.width=a.width,this.height=a.height,a.width="0px",a.height="0px",QSI.util.setStyle(this.container,a),this.reposition()},resizeElements:function(){var a=this;QSI.util.each(this.elements,function(b,c){var d=a.convertPercentStylesToPixels(b.style,b.unitsOfMeasurement),e=a.elementNodes[c];e&&a.resizeElement(e,b,d)})},getContainerDimensions:function(){var a=0,b=0,c=this;return QSI.util.each(this.elements,function(d){var e=c.convertPercentStylesToPixels(d.style,d.unitsOfMeasurement),f=0;e&&e.borderWidth&&(f=2*parseInt(e.borderWidth,10));var g=e.width+parseInt(c.getXPosition(d.position),10)+f,h=e.height+parseInt(c.getYPosition(d.position),10)+f;g>a&&(a=g),h>b&&(b=h)}),{width:a,height:b}},resizeElement:function(a,b,c){var d=parseInt(c.borderWidth,10),e=c.width,f=c.height;if(QSI.util.setStyle(a,{width:e+"px",height:f+"px"}),b.dropShadow){isNaN(d)&&(d=0),a.removeChild(a.firstChild);var g=2*d;a.insertBefore(this.buildDropShadow(e+g,f+g,d),a.children[0])}},getElementStyle:function(a,b,c){return a=this.convertPercentStylesToPixels(a,c),{top:this.getYPosition(b)+"px",left:this.getXPosition(b)+"px",position:"absolute",zIndex:a.zIndex,width:a.width+"px",height:a.height+"px",backgroundColor:a.backgroundColor,borderWidth:a.borderWidth+"px",borderColor:a.borderColor,borderStyle:"solid",borderRadius:a.borderRadius+"px",display:a.display}},closeOnTargetClick:function(){this.displayOptions.removeOnTargetClick?this.container.parentNode.removeChild(this.container):this.slideIn(),this.slideIn()},remove:function(){this.removed=!0,this.container&&QSI.util.remove(this.container)},close:function(a){try{this.displayOptions.removeOnClose?this.container.parentNode&&this.container.parentNode.removeChild(this.container):this.slideIn(),a||(this.userOpened=!1,this.userClosed=!0)}catch(b){}}}));
