(function(f){var d={};var b=f.document.documentElement,e;function c(){var i=b.getBoundingClientRect().width;if(i>640){i=640}var g=i/10;if(actualSize!==g&&actualSize>0&&Math.abs(actualSize-g)>1){var h=g*g/actualSize;b.style.fontSize=h+"px"}}function a(){clearTimeout(e);e=setTimeout(c,100)}f.addEventListener("resize",function(){a()},false);f.addEventListener("pageshow",function(g){if(g.persisted){a()}},false);c();d.refreshRem=c;d.rem2px=function(g){var h=parseFloat(g)*this.rem;if(typeof g==="string"&&g.match(/rem$/)){h+="px"}return h};d.px2rem=function(g){var h=parseFloat(g)/this.rem;if(typeof g==="string"&&g.match(/px$/)){h+="rem"}return h};f.remCalc=d})(window);