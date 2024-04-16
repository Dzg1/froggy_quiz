let astre = document.querySelector("#astre");
let fqz = document.querySelector("#title");
const span1 = document.querySelector("#span1");
const span2 = document.querySelector("#span2");
let cloud = document.querySelector("#cloud");
let cloudBack = document.querySelector("#cloud-back");
let tds1 = document.querySelector("#tds1");
let tds2 = document.querySelector("#tds2");
let justQ = document.querySelector("#just-q");
let nav1 = document.querySelector("#nav1");
let nav2 = document.querySelector("#nav2");
let parallax = document.querySelector("#section");
let stats = document.querySelector("#stats");

document.addEventListener("scroll", () => {
  let value = window.scrollY;
  fqz.style.top = value * 1 + 300 + "px";
  if (value < 340) {
    fqz.style.left = 50 - value / 40 + "%";
    tds1.style.width = value * 1 + "px";
    tds2.style.width = value * 1 + "px";
  }
  span1.style.left = 50 + value / 15 + "%";
  span1.style.top = value * 1 + 200 + "px";
  span2.style.left = 50 - value / 15 + "%";
  span2.style.top = value * 1 + 520 + "px";
  if (value < 10) {
    justQ.style.left = -80 + value * 1 + "px";
  } 
    if (value >= 1040) {
      nav2.style.position = "fixed";
      nav2.style.top = "4rem";
    } else {
      nav2.style.position = "absolute";
      nav2.style.top = "";
    }
  


  // let header = document.querySelector('#header');
  // let headerHeight = header.offsetHeight;
  // let footer = document.querySelector('#footer');
  // let footerTop = footer.offsetTop;
  // let statsHeight = stats.offsetHeight;

  // if (value >= headerHeight && value <= footerTop - statsHeight) {
  //   stats.style.position = "fixed";
  //   stats.style.top = `${headerHeight}px`;
  // } else {
  //   stats.style.position = "relative";
  //   stats.style.top = "";
  // }

  
  if (value >= 2043) {
    stats.style.position = "fixed";
    stats.style.top = "190px";
  } else {
    stats.style.position = "sticky";
    stats.style.top = "";
  }
  if (value >= 2600) {
    stats.style.marginTop = "550px";
    stats.style.position = "sticky";
    stats.style.top = "";
  } else {
    stats.style.marginTop = "0px";
  }


  astre.style.top = value * 1.1 - 400 + "px";
  astre.style.left = value * -0.1 - 150 + "px";
  cloudBack.style.top = value * 0.9 + "px";
  cloud.style.top = value * 0.5 + "px";
});

/*******theme all************/
function between(val, min, max) {
  return Math.max(min, Math.min(val, max));
}

function scaling(d) {
  return Math.max(Math.min(-0.2 * Math.pow(d, 2) + 1.05, 1), 0);
}

let transformOrigins = {
  "-1": "right",
  0: "center",
  1: "left",
};

class Theme {
  scale = 1;
  constructor(el) {
    this.root = el;
    this.icons = Array.from(el.children);
    if (this.icons.lenght === 0) {
      return;
    }
    this.iconSize = this.icons[0].offsetWidth;
    el.addEventListener("mousemove", this.handleMouseMove.bind(this));
    el.addEventListener("mouseleave", this.handleMouseLeave.bind(this));
    el.addEventListener("mouseenter", this.handleMouseEnter.bind(this));
  }

  handleMouseMove(e) {
    this.mousePosition = between(
      (e.clientX - this.root.offsetLeft) / this.iconSize,
      0,
      this.icons.length
    );
    this.scaleIcons();
  }
  scaleIcons() {
    let selectedIndex = Math.floor(this.mousePosition);
    let centerOffset = this.mousePosition - selectedIndex - 0.5;
    let baseOffset = this.scaleFromDirection(
      selectedIndex,
      0,
      -centerOffset * this.iconSize
    );
    let offset = baseOffset * (0.5 - centerOffset);
    for (let i = selectedIndex + 1; i < this.icons.length; i++) {
      offset += this.scaleFromDirection(i, 1, offset);
    }
    offset = baseOffset * (0.5 + centerOffset);
    for (let i = selectedIndex - 1; i >= 0; i--) {
      offset += this.scaleFromDirection(i, -1, -offset);
    }
  }
  scaleFromDirection(index, direction, offset) {
    let center = index + 0.5;
    let distanceFromPointer = this.mousePosition - center;
    let scale = scaling(distanceFromPointer) * this.scale;
    let icon = this.icons[index];
    icon.style.setProperty(
      "transform",
      `translateX(${offset}px) scale(${scale + 1})`
    );
    icon.style.setProperty(
      "transform-origin",
      `${transformOrigins[direction.toString()]} bottom`
    );
    return scale * this.iconSize;
  }
  handleMouseLeave() {
    this.root.classList.add("animated");
    this.icons.forEach((icon) => {
      icon.style.removeProperty("transform");
      icon.style.removeProperty("transform-origin");
    });
  }
  handleMouseEnter() {
    this.root.classList.add("animated");
    window.setTimeout(() => {
      this.root.classList.remove("animated");
    }, 100);
  }
}

new Theme(document.querySelector(".all-theme"));
