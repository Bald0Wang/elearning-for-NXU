var gl, canvas,  pi180 = 180/Math.PI,
  transl = -3, rTouch, fiTouch, idTouch0,
  xRot = yRot = zRot =  xOffs = yOffs =  drag = 0;
function startTouch(evt) {
  var evList = evt.touches;
  if(evList.length == 1){
    xOffs = evList[0].pageX;  yOffs = evList[0].pageY;
    drag = 1;}
  else if(evList.length == 2){
    idTouch0 = evList[0].identifier;
    var dx = evList[1].pageX - evList[0].pageX;
    var dy = evList[1].pageY - evList[0].pageY;
    rTouch = Math.sqrt(dx*dx + dy*dy);
    fiTouch = Math.atan2(dy, dx);
    drag = 2;}
  evt.preventDefault();
}
function continueTouch(evt) {
  if(drag == 1){
    var x = evt.touches[0].pageX,  y = evt.touches[0].pageY;
    yRot = x - xOffs;  xRot = y - yOffs;
    xOffs = x;  yOffs = y;
evt.preventDefault();
    drawScene();}
  else if(drag == 2){
    var dx = evt.touches[1].pageX - evt.touches[0].pageX;
    var dy = evt.touches[1].pageY - evt.touches[0].pageY;
    var r = Math.sqrt(dx*dx + dy*dy);
    var fi;
    if( idTouch0 == evt.touches[0].identifier ) fi = Math.atan2(dy, dx);
    else fi = Math.atan2(-dy, -dx);
    transl *= rTouch / r;
    zRot = pi180*(fiTouch - fi);
    rTouch = r;  fiTouch = fi;
evt.preventDefault();
    drawScene();
  }
}
function stopTouch() {
  drag = 0;
}
function mymousedown( ev ){
  drag  = 1;
  xOffs = ev.clientX;  yOffs = ev.clientY;
}
function mymouseup( ev ){
  drag  = 0;
}
function mymousemove( ev ){
  if ( drag == 0 ) return;
  if ( ev.shiftKey ) {
    transl *= 1 + (ev.clientY - yOffs)/1000;
    zRot = (xOffs - ev.clientX)*.3; }
  else {
    yRot = - xOffs + ev.clientX;  xRot = - yOffs + ev.clientY; }
  xOffs = ev.clientX;   yOffs = ev.clientY;
ev.preventDefault();
  drawScene();
}
function wheelHandler(ev) {
  var del = 1.1;
  if (ev.shiftKey) del = 1.01;
  var ds = ((ev.detail || ev.wheelDelta) > 0) ? del : (1 / del);
  transl *= ds;
ev.preventDefault();
  drawScene();
}
function getShader ( gl, id ){
   var shaderScript = document.getElementById ( id );
   var str = "";
   var k = shaderScript.firstChild;
   while ( k ){
     if ( k.nodeType == 3 ) str += k.textContent;
     k = k.nextSibling;
   }
   var shader;
   if ( shaderScript.type == "x-shader/x-fragment" )
           shader = gl.createShader ( gl.FRAGMENT_SHADER );
   else if ( shaderScript.type == "x-shader/x-vertex" )
           shader = gl.createShader(gl.VERTEX_SHADER);
   else return null;
   gl.shaderSource(shader, str);
   gl.compileShader(shader);
   if (gl.getShaderParameter(shader, gl.COMPILE_STATUS) == 0)
      alert(id + "\n" + gl.getShaderInfoLog(shader));
   return shader;
}
function initGL(){
   canvas = document.getElementById("canvas");
   if (!window.WebGLRenderingContext){
     alert("Your browser does not support WebGL. See http://get.webgl.org");
     return;}
   try { gl = canvas.getContext("experimental-webgl");
   } catch(e) {}
   if ( !gl ) {alert("Can't get WebGL"); return;}
   canvas.addEventListener('DOMMouseScroll', wheelHandler, false);
   canvas.addEventListener('mousewheel', wheelHandler, false);
   canvas.addEventListener('mousedown', mymousedown, false);
   canvas.addEventListener('mouseup', mymouseup, false);
   canvas.addEventListener('mousemove', mymousemove, false);
   canvas.addEventListener('touchstart', startTouch, false);
   canvas.addEventListener('touchmove', continueTouch, false);
   canvas.addEventListener('touchend', stopTouch, false);
}
function init2d(){
   cnv2d.addEventListener('mousemove', drag2, false)
   cnv2d.addEventListener('touchmove', drag2, false)
   cnv2d.addEventListener('mousedown', start_drag2, false)
   cnv2d.addEventListener('touchstart', start_drag2, false)                                    
   cnv2d.addEventListener('touchend', stop_drag2, false)
   cnv2d.addEventListener('DOMMouseScroll', wheelHandler2, false);
   cnv2d.addEventListener('mousewheel', wheelHandler2, false);
}
function drag2(ev){
  if (!isMouseDown) return
  var c = getXY2(ev)
  if (radio == "r") CP[aCP][3*dragId] = c[0]
  else CP[aCP][3*dragId + 2] = c[0]
  CP[aCP][3*dragId + 1] = c[1]
  draw2()
  ev.preventDefault()
}
function start_drag2(ev){
  isMouseDown = true
  var c = getXY2(ev)
  var Rmin = 2, r2,xi,yi, Id = 0
  for (var i = 0; i < n; i++){
    yi = c[1] - CP[aCP][3*i + 1]
    xi = (radio == "r") ? c[0] - CP[aCP][3*i] : c[0] - CP[aCP][3*i + 2]
    r2 = xi*xi + yi*yi
    if ( r2 < Rmin ){ Id = i; Rmin = r2}
  }
  dragId = Id
  ev.preventDefault()
}
function stop_drag2(ev){
  dragId = -1
  ev.preventDefault()
}
function wheelHandler2(ev) {
  var del = .03
  if (ev.shiftKey) del = .003
  var ds = ((ev.detail || ev.wheelDelta) > 0) ? del : - del
  age += ds
  if(age > 1) age = 1
  if(age < 0) age = 0
  document.getElementById("age").value = age.toFixed(2)
  ev.preventDefault()
  draw2()
}
function getXY2(ev){
  if (!ev.clientX) ev = ev.touches[0]
  var rect = cnv2d.getBoundingClientRect()
  var x = (ev.clientX - rect.left) / w,
      y = (h - (ev.clientY - rect.top)) / h
  return [x, y]
}
