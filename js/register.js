$(document).ready(function(){
    var blackLine = $(".black-line"),
        ball = $(".main-container"),
        mainForm = $(".main-forms"),
        top = $(".pokemon-top-part"),
        bottom = $(".pokemon-bottom-part"),
        h = $(".sign-back h1"),
        row = $(".signup-row"),
        arrow= $(".signup-row a"),
        rem = $(".remember"),
        tl = new TimelineMax();
  
        // Start
        tl
        .to(blackLine,0.5,{className:'+=red-circle'})
        .to(blackLine,0.5,{className:'-=red-circle'})
        .to(blackLine,0.5,{className:'+=red-circle'})
        .to(blackLine,0.5,{className:'-=red-circle'})
        .to(blackLine,0.5,{className:'+=red-circle'})
        .to(blackLine,0.5,{className:'-=red-circle'})
        .to(blackLine,0.5,{className:'+=red-circle'})
        .to(blackLine,0.5,{className:'-=red-circle'})
        .to(ball,0.5,{y:"-70%",ease:Power4.easeOut})
        .to(ball,0.5,{y:"-50%",ease:Bounce.easeOut})
        .to(ball,0.5,{y:"-85%",ease:Power4.easeOut},"+=0.5")
        .to(ball,0.5,{y:"-50%",ease:Bounce.easeOut})
        .to(ball,0.5,{y:"-100%",ease:Power4.easeOut},"+=0.5")
        .to(ball,0.5,{y:"-50%",ease:Bounce.easeOut,onComplete:toggle})
        ;
        function toggle(o){
          $(".main-forms").slideDown(1500);
          tl
          .to(top,1,{autoAlpha:0})
          .to(bottom,1,{autoAlpha:0},"-=1")
          .fromTo(h,1,{autoAlpha:0,y:-20},{autoAlpha:1,y:0},"+=0.5")
          .staggerFrom(row,1,{left:"-100%",autoAlpha:0},0.2)
          .staggerFrom(rem,1,{cycle:{y:[20,-20]},autoAlpha:0},0.2)
  
  }
  
  })
  


// Hàm xác nhận xóa tài khoản
function confirmDelete() {
  var result = confirm("Bạn có chắc chắn muốn xóa tài khoản?");
  if (result) {
    deleteAccount();
  } else {
    console.log("Hủy xóa tài khoản");
  }
}

// Hàm xóa tài khoản
function deleteAccount() {
  var username = document.querySelector('input[name="username"]').value;
  var role = document.querySelector('input[name="role"]:checked').value;
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "delete_account.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.send("username=" + encodeURIComponent(username) +
            "&role=" + encodeURIComponent(role));
  alert("Tài khoản đã được xóa.");
}

// Hàm đăng ký tài khoản
function registerAccount() {
  var username = document.querySelector('input[name="username"]').value;
  var password = document.querySelector('input[name="password"]').value;
  var role = document.querySelector('input[name="role"]:checked').value;
  
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "register_account.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.send("username=" + encodeURIComponent(username) +
           "&password=" + encodeURIComponent(password) +
           "&role=" + encodeURIComponent(role));
  alert("Tài khoản đã được đăng ký.");
}
