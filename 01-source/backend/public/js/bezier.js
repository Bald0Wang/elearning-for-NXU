function Bezier(canvas1id, canvas2id, scale, ptX, ptY){

var canvas, canvas2, ctx, ctx2, w,h,h1, d,d2,  dragId = -1;
var n = ptX.length, n1 = n+1;
var iColor = ["#f00000","#00f000","#0000f0","#00f0f0","#f0f000","#f000f0","#090909"];
var Px = new Float64Array(ptX),
    Py = new Float64Array(ptY);
   canvas = document.getElementById(canvas1id);
   ctx = canvas.getContext("2d");
   canvas2 = document.getElementById(canvas2id);
   ctx2 = canvas2.getContext("2d");
   canvas.addEventListener('mousemove', drag, false);
   canvas.addEventListener('touchmove', drag, false);
   canvas.addEventListener('mousedown', start_drag, false);
   canvas.addEventListener('mouseup', stop_drag, false);
   canvas.addEventListener('touchstart', start_drag, false);
   canvas.addEventListener('touchend', stop_drag, false);
   window.addEventListener('resize', resize, false);
   resize();

function drawFun(){
  var step = d2/(w - d2), t = step;
  var B = new Float64Array(n1);
  var Bo = new Float64Array(n1);
  var Bold = new Float64Array(n1);
  B[1] = Bo[1] = h1;
  ctx2.clearRect(0,0, w, h);
  ctx2.lineWidth = d;
  for (var k = d2; k < w; k += d2){
   Bold.set(B);
   B.set(Bo);
   for (var j = 1; j < n; j++){
    for (var i = j+1; i > 0; i--)
     B[i] = (1-t)*B[i] + t*B[i-1];
   }
   for (var m = 1; m < n1; m++){
    ctx2.strokeStyle = iColor[(m-1) % 7];
    ctx2.beginPath();  ctx2.moveTo(k-d2, h1-Bold[m]);  ctx2.lineTo(k, h1-B[m]);
    ctx2.stroke();
   }
   t += step;
  }
}
function drawSpline(){
  var step = 1/w, t = step;
  var Pxi = new Float64Array(n), Pyi = new Float64Array(n);
  var scPx = new Float64Array(n), scPy = new Float64Array(n);
  var X,Y;
  ctx.clearRect(0,0, w, h);
  ctx.lineWidth = d;
  ctx.strokeStyle = "#0000f0";
  for (var i = 0; i < n; i++){
   X = scPx[i] = Px[i]*w;
   Y = scPy[i] = Py[i]*h;
   ctx.strokeRect(X - d, h1 - Y - d, d2,d2);
  }
  if ( n > 2 ){
   ctx.beginPath();  ctx.moveTo(scPx[0], h1 - scPy[0]);
   for (var i = 1; i < n; i++)
    ctx.lineTo(scPx[i], h1 - scPy[i]);
   ctx.stroke();
  }
  ctx.lineWidth = d2;
  ctx.strokeStyle = "#f00000";
  ctx.beginPath();  ctx.moveTo(scPx[0], h1 - scPy[0]);
  for (var k = 1; k < w; k++){
   Pxi.set(scPx);
   Pyi.set(scPy);
   for (var j = n - 1; j > 0; j--)
    for (var i = 0; i < j; i++){
     Pxi[i] = (1-t)*Pxi[i] + t*Pxi[i+1];
     Pyi[i] = (1-t)*Pyi[i] + t*Pyi[i+1];}
   ctx.lineTo(Pxi[0], h1 - Pyi[0]);
   t += step;
  }
  ctx.stroke();
}
function resize(){
   h = w = Math.round(window.innerWidth * scale);
   h1 = h-1;
   d = Math.max(1, Math.round(w / 250));  d2 = d+d;
   canvas.width = w;  canvas.height = h;
   canvas2.width = w; canvas2.height = h;
   drawFun();
   drawSpline();
}
function drag(ev){
  if (dragId < 0) return;
  var c = getXY(ev);
  Px[dragId] = c[0];  Py[dragId] = c[1];
  drawSpline();
  ev.preventDefault();
}
function start_drag(ev){
  var c = getXY(ev);
  var Rmin = 2, r2,xi,yi;
  for (var i = 0; i < n; i++){
   xi = (c[0] - Px[i]); yi = (c[1] - Py[i]);
   r2 = xi*xi + yi*yi;
   if ( r2 < Rmin ){ dragId = i; Rmin = r2;}}
  Px[dragId] = c[0];  Py[dragId] = c[1];
  drawSpline();
  ev.preventDefault();
}
function stop_drag(ev){
  dragId = -1;
  ev.preventDefault();
}
function getXY(ev){
  if (!ev.clientX) ev = ev.touches[0];
  var rect = canvas.getBoundingClientRect();
  var x = (ev.clientX - rect.left) / w,
      y = (h1 - (ev.clientY - rect.top)) / h;
  return [x, y];
}
} // end Bezier
