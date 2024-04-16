let btns = document.querySelectorAll(".btn");



btns.forEach( function (btn){
    btn.addEventListener("mousedown", () => {
        btn.classList.add("next-pushed");
          })
          btn.addEventListener("mouseup", () => {
        btn.classList.remove("next-pushed");
          })
})

