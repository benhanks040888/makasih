var isPushEnabled = false;

window.addEventListener('load', function() {
  // subscribe();

  if (navigator.serviceWorker) {
    navigator.serviceWorker.register('/service-worker.js')
      .then(function(reg) {
        console.log(':^)', reg);
        navigator.serviceWorker.ready.then(function(reg) {  
          reg.pushManager.subscribe({
            userVisibleOnly: true
          }).then(function(sub) {
            console.log('endpoint:', sub.endpoint);
          });
        });
      });
  } else {
    console.warn('Service workers are not supported in this browser');
  }
});

/**
 * Behaves the same as setInterval except uses requestAnimationFrame() where possible for better performance
 * @param {function} fn The callback function
 * @param {int} delay The delay in milliseconds
 */
window.requestInterval = function(fn, delay) {
  if( !window.requestAnimationFrame       && 
    !window.webkitRequestAnimationFrame && 
    !(window.mozRequestAnimationFrame && window.mozCancelRequestAnimationFrame) && // Firefox 5 ships without cancel support
    !window.oRequestAnimationFrame      && 
    !window.msRequestAnimationFrame)
      return window.setInterval(fn, delay);
      
  var start = new Date().getTime(),
    handle = new Object();
    
  function loop() {
    var current = new Date().getTime(),
      delta = current - start;
      
    if(delta >= delay) {
      fn.call();
      start = new Date().getTime();
    }

    handle.value = requestAnimationFrame(loop);
  };
  
  handle.value = requestAnimationFrame(loop);
  return handle;
}

/**
 * Behaves the same as clearInterval except uses cancelRequestAnimationFrame() where possible for better performance
 * @param {int|object} fn The callback function
 */
    window.clearRequestInterval = function(handle) {
    window.cancelAnimationFrame ? window.cancelAnimationFrame(handle.value) :
    window.webkitCancelAnimationFrame ? window.webkitCancelAnimationFrame(handle.value) :
    window.webkitCancelRequestAnimationFrame ? window.webkitCancelRequestAnimationFrame(handle.value) : /* Support for legacy API */
    window.mozCancelRequestAnimationFrame ? window.mozCancelRequestAnimationFrame(handle.value) :
    window.oCancelRequestAnimationFrame ? window.oCancelRequestAnimationFrame(handle.value) :
    window.msCancelRequestAnimationFrame ? window.msCancelRequestAnimationFrame(handle.value) :
    clearInterval(handle);
};

window.onload = function(){
  //canvas init
  var canvas = document.getElementById("snow");
  var ctx = canvas.getContext("2d");
  
  //canvas dimensions
  var W = window.innerWidth;
  var H = window.innerHeight;
  canvas.width = W;
  canvas.height = H;
  
  //snowflake particles
  var mp = 50; //max particles
  var particles = [];
  for(var i = 0; i < mp; i++)
  {
    particles.push({
      x: Math.random()*W, //x-coordinate
      y: Math.random()*H, //y-coordinate
      r: Math.random()*4+1, //radius
      d: Math.random()*mp //density
    })
  }
  
  //Lets draw the flakes
  function draw()
  {
    ctx.clearRect(0, 0, W, H);
    
    ctx.fillStyle = "rgba(255, 255, 255, 0.8)";
    ctx.beginPath();
    for(var i = 0; i < mp; i++)
    {
      var p = particles[i];
      ctx.moveTo(p.x, p.y);
      ctx.arc(p.x, p.y, p.r, 0, Math.PI*2, true);
    }
    ctx.fill();
    update();
  }
  
  //Function to move the snowflakes
  //angle will be an ongoing incremental flag. Sin and Cos functions will be applied to it to create vertical and horizontal movements of the flakes
  var angle = 0;
  function update()
  {
    angle += 0.01;
    for(var i = 0; i < mp; i++)
    {
      var p = particles[i];
      //Updating X and Y coordinates
      //We will add 1 to the cos function to prevent negative values which will lead flakes to move upwards
      //Every particle has its own density which can be used to make the downward movement different for each flake
      //Lets make it more random by adding in the radius
      p.y += Math.cos(angle+p.d) + 1 + p.r/2;
      p.x += Math.sin(angle) * 2;
      
      //Sending flakes back from the top when it exits
      //Lets make it a bit more organic and let flakes enter from the left and right also.
      if(p.x > W+5 || p.x < -5 || p.y > H)
      {
        if(i%3 > 0) //66.67% of the flakes
        {
          particles[i] = {x: Math.random()*W, y: -10, r: p.r, d: p.d};
        }
        else
        {
          //If the flake is exitting from the right
          if(Math.sin(angle) > 0)
          {
            //Enter from the left
            particles[i] = {x: -5, y: Math.random()*H, r: p.r, d: p.d};
          }
          else
          {
            //Enter from the right
            particles[i] = {x: W+5, y: Math.random()*H, r: p.r, d: p.d};
          }
        }
      }
    }
  }
  
  //animation loop
  requestInterval(draw, 16);
}


$(window).load(function() {
  $('.loader').addClass('out');

  new WOW().init();
});

$(function() {
  FastClick.attach(document.body);

  // fake preloader
  // setTimeout(function() {
  //   $('.loader').addClass('out');
  // }, 500);

  // new WOW().init();

  $('nav.smooth-scroll > a').on('click', function(e) {
    e.preventDefault();

    $('html, body').animate({
      scrollTop: $($(this).attr('href')).offset().top
    }, 800);
  });

  $('nav > a').on('mouseenter', function() {
    $('nav').addClass('jelly');
  })
  .on('mouseout', function() {
    $('nav').removeClass('jelly');
  });
});