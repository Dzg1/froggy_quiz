let list = document.querySelectorAll(".navdrop");
let drop = document.querySelectorAll(".drop");
let indicator = document.querySelector("#indicator");
let language = document.querySelector("#language")
let box = document.querySelector("#box-language");
let indicatorSousmenu = document.querySelector("#indicator-sousmenu");
let indicatorBefore = document.querySelector("#indicator-sousmenu::before");
let indicatorAfter = document.querySelector("#indicator-sousmenu::before");
let spaceSousmenu = document.querySelector("#container-sousmenu-language");
let boxTheme = document.querySelector("#box-theme");
let spaceTheme = document.querySelector("#container-sousmenu-theme");
let theme = document.querySelector("#theme");
let fr = document.querySelector("#fr");
let uk = document.querySelector("#uk");
let light = document.querySelector("#light");
let dark = document.querySelector("#dark");
let noDrop = document.querySelector("#no-drop");

function active(a) {
  drop.forEach((item) => {
      item.style.transitionDelay = "0s";
    item.classList.remove("active");
});
drop[a].style.transitionDelay = ".2s";
drop[a].classList.add("active");
}

for (let i = 0; i < list.length; i++) {
  list[i].addEventListener("click", () => {
    active(i);
    let calcule = -5+ i*100;
    indicator.style.left= calcule+"px";
 
    indicator.style.height= drop[i].offsetHeight +10 +"px";
  });  
  indicator.addEventListener("mouseout", () => {
    drop[i].classList.remove("active");
    drop[i].style.transitionDelay = "0s";
    indicator.style.left = "-1200px";
    indicator.style.height = "80px";
    box.classList.remove("box-size-up");
    spaceSousmenu.classList.remove("space-sousmenu");
    indicatorSousmenu.classList.remove("size-indicator");
    indicatorSousmenu.classList.remove("size-indicator-theme");
    boxTheme.classList.remove("box-size-up");
    spaceTheme.classList.remove("space-sousmenu");
  });
  
  // noDrop.addEventListener("click", () =>{
  //   noDrop.style.background = "blue" ;
  //   drop[i].classList.remove("active");
  //   drop[i].style.transitionDelay = "0s";
  //   indicator.style.left = "-800px";
  //   indicator.style.height = "80px";
  //   box.classList.remove("box-size-up");
  //   spaceSousmenu.classList.remove("space-sousmenu");
  //   indicatorSousmenu.classList.remove("size-indicator");
  // });

}


language.addEventListener("click", () =>{
  box.forEach(langue =>{
    if( langue.style.display = "none"){
      langue.style.display = "block"
    }else{ langue.style.display = "none"}
  })
})

language.addEventListener("click", () =>{
  boxTheme.classList.remove("box-size-up");
  spaceTheme.classList.remove("space-sousmenu");
  indicatorSousmenu.classList.remove("size-indicator-theme");
  box.classList.toggle("box-size-up");
  spaceSousmenu.classList.toggle("space-sousmenu");
  indicatorSousmenu.classList.toggle("size-indicator");
})

theme.addEventListener("click", () => {
  box.classList.remove("box-size-up");
  spaceSousmenu.classList.remove("space-sousmenu");
  indicatorSousmenu.classList.remove("size-indicator");
  boxTheme.classList.toggle("box-size-up");
  spaceTheme.classList.toggle("space-sousmenu");
  indicatorSousmenu.classList.toggle("size-indicator-theme");
})

fr.addEventListener("mouseover", () =>{
  indicatorSousmenu.style.background = "url(./assets/images/fr.png)";
  indicatorSousmenu.style.backgroundSize ="cover"; 
  uk.style.color = "transparent";
})
fr.addEventListener("mouseout", () =>{
  indicatorSousmenu.style.background = "#e9eff4";
  uk.style.color = "black";
  
})
uk.addEventListener("mouseover", () =>{
  indicatorSousmenu.style.background = "url(./assets/images/uk.png)";
  indicatorSousmenu.style.backgroundSize ="cover"; 
  fr.style.color = "transparent";
})
uk.addEventListener("mouseout", () =>{
  indicatorSousmenu.style.background = "#e9eff4";
  fr.style.color = "black";
  
})
light.addEventListener("mouseover", () =>{
  // indicatorSousmenu.style.background = "url(./assets/images/light.png)";
  // indicatorSousmenu.style.backgroundSize ="cover"; 
  dark.style.color = "transparent";
})
light.addEventListener("mouseout", () =>{
  indicatorSousmenu.style.background = "#e9eff4";
  dark.style.color = "black";
  
})
dark.addEventListener("mouseover", () =>{
  indicatorSousmenu.style.background = "url(./assets/images/dark.png)";
  indicatorSousmenu.style.backgroundSize ="cover"; 
  light.style.color = "transparent";
})
dark.addEventListener("mouseout", () =>{
  indicatorSousmenu.style.background = "#e9eff4";
  light.style.color = "black";
})

/*****dark mode****/

dark.addEventListener("click", () => {
  document.body.style.setProperty('background', 'var(--dark-background)');
  document.documentElement.style.setProperty('--color1', '#000000');
  document.documentElement.style.setProperty('--color3', '#1a1a2e');
}) 

light.addEventListener("click", () => {
  document.body.style.setProperty('background', 'var(--light-background)');
  document.documentElement.style.setProperty('--color', '#f2f2f2');
  document.documentElement.style.setProperty('--color3', 'white');
})