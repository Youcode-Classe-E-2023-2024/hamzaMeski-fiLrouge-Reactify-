function locomotive() {
  gsap.registerPlugin(ScrollTrigger);

  const locoScroll = new LocomotiveScroll({
    el: document.querySelector("#main"),
    smooth: true ,
  });
  locoScroll.on("scroll", ScrollTrigger.update);

  ScrollTrigger.scrollerProxy("#main", {
    scrollTop(value) {
      return arguments.length
        ? locoScroll.scrollTo(value, 0, 0)
        : locoScroll.scroll.instance.scroll.y;
    },

    getBoundingClientRect() {
      return {
        top: 0,
        left: 0,
        width: window.innerWidth,
        height: window.innerHeight,
      };
    },

    pinType: document.querySelector("#main").style.transform
      ? "transform"
      : "fixed",
  });
  ScrollTrigger.addEventListener("refresh", () => locoScroll.update());
  ScrollTrigger.refresh();
}
locomotive();


const canvas = document.querySelector("canvas");
const context = canvas.getContext("2d");

canvas.width = window.innerWidth;
canvas.height = window.innerHeight;


window.addEventListener("resize", function () {
  canvas.width = window.innerWidth;
  canvas.height = window.innerHeight;
  render();
});

function files(index) {
  var data = `
    ../3d-landing/male0001.png
    ../3d-landing/male0002.png
    ../3d-landing/male0003.png
    ../3d-landing/male0004.png
    ../3d-landing/male0005.png
    ../3d-landing/male0006.png
    ../3d-landing/male0007.png
    ../3d-landing/male0008.png
    ../3d-landing/male0009.png
    ../3d-landing/male0010.png
    ../3d-landing/male0011.png
    ../3d-landing/male0012.png
    ../3d-landing/male0013.png
    ../3d-landing/male0014.png
    ../3d-landing/male0015.png
    ../3d-landing/male0016.png
    ../3d-landing/male0017.png
    ../3d-landing/male0018.png
    ../3d-landing/male0019.png
    ../3d-landing/male0020.png
    ../3d-landing/male0021.png
    ../3d-landing/male0022.png
    ../3d-landing/male0023.png
    ../3d-landing/male0024.png
    ../3d-landing/male0025.png
    ../3d-landing/male0026.png
    ../3d-landing/male0027.png
    ../3d-landing/male0028.png
    ../3d-landing/male0029.png
    ../3d-landing/male0030.png
    ../3d-landing/male0031.png
    ../3d-landing/male0032.png
    ../3d-landing/male0033.png
    ../3d-landing/male0034.png
    ../3d-landing/male0035.png
    ../3d-landing/male0036.png
    ../3d-landing/male0037.png
    ../3d-landing/male0038.png
    ../3d-landing/male0039.png
    ../3d-landing/male0040.png
    ../3d-landing/male0041.png
    ../3d-landing/male0042.png
    ../3d-landing/male0043.png
    ../3d-landing/male0044.png
    ../3d-landing/male0045.png
    ../3d-landing/male0046.png
    ../3d-landing/male0047.png
    ../3d-landing/male0048.png
    ../3d-landing/male0049.png
    ../3d-landing/male0050.png
    ../3d-landing/male0051.png
    ../3d-landing/male0052.png
    ../3d-landing/male0053.png
    ../3d-landing/male0054.png
    ../3d-landing/male0055.png
    ../3d-landing/male0056.png
    ../3d-landing/male0057.png
    ../3d-landing/male0058.png
    ../3d-landing/male0059.png
    ../3d-landing/male0060.png
    ../3d-landing/male0061.png
    ../3d-landing/male0062.png
    ../3d-landing/male0063.png
    ../3d-landing/male0064.png
    ../3d-landing/male0065.png
    ../3d-landing/male0066.png
    ../3d-landing/male0067.png
    ../3d-landing/male0068.png
    ../3d-landing/male0069.png
    ../3d-landing/male0070.png
    ../3d-landing/male0071.png
    ../3d-landing/male0072.png
    ../3d-landing/male0073.png
    ../3d-landing/male0074.png
    ../3d-landing/male0075.png
    ../3d-landing/male0076.png
    ../3d-landing/male0077.png
    ../3d-landing/male0078.png
    ../3d-landing/male0079.png
    ../3d-landing/male0080.png
    ../3d-landing/male0081.png
    ../3d-landing/male0082.png
    ../3d-landing/male0083.png
    ../3d-landing/male0084.png
    ../3d-landing/male0085.png
    ../3d-landing/male0086.png
    ../3d-landing/male0087.png
    ../3d-landing/male0088.png
    ../3d-landing/male0089.png
    ../3d-landing/male0090.png
    ../3d-landing/male0091.png
    ../3d-landing/male0092.png
    ../3d-landing/male0093.png
    ../3d-landing/male0094.png
    ../3d-landing/male0095.png
    ../3d-landing/male0096.png
    ../3d-landing/male0097.png
    ../3d-landing/male0098.png
    ../3d-landing/male0099.png
    ../3d-landing/male0100.png
    ../3d-landing/male0101.png
    ../3d-landing/male0102.png
    ../3d-landing/male0103.png
    ../3d-landing/male0104.png
    ../3d-landing/male0105.png
    ../3d-landing/male0106.png
    ../3d-landing/male0107.png
    ../3d-landing/male0108.png
    ../3d-landing/male0109.png
    ../3d-landing/male0110.png
    ../3d-landing/male0111.png
    ../3d-landing/male0112.png
    ../3d-landing/male0113.png
    ../3d-landing/male0114.png
    ../3d-landing/male0115.png
    ../3d-landing/male0116.png
    ../3d-landing/male0117.png
    ../3d-landing/male0118.png
    ../3d-landing/male0119.png
    ../3d-landing/male0120.png
    ../3d-landing/male0121.png
    ../3d-landing/male0122.png
    ../3d-landing/male0123.png
    ../3d-landing/male0124.png
    ../3d-landing/male0125.png
    ../3d-landing/male0126.png
    ../3d-landing/male0127.png
    ../3d-landing/male0128.png
    ../3d-landing/male0129.png
    ../3d-landing/male0130.png
    ../3d-landing/male0131.png
    ../3d-landing/male0132.png
    ../3d-landing/male0133.png
    ../3d-landing/male0134.png
    ../3d-landing/male0135.png
    ../3d-landing/male0136.png
    ../3d-landing/male0137.png
    ../3d-landing/male0138.png
    ../3d-landing/male0139.png
    ../3d-landing/male0140.png
    ../3d-landing/male0141.png
    ../3d-landing/male0142.png
    ../3d-landing/male0143.png
    ../3d-landing/male0144.png
    ../3d-landing/male0145.png
    ../3d-landing/male0146.png
    ../3d-landing/male0147.png
    ../3d-landing/male0148.png
    ../3d-landing/male0149.png
    ../3d-landing/male0150.png
    ../3d-landing/male0151.png
    ../3d-landing/male0152.png
    ../3d-landing/male0153.png
    ../3d-landing/male0154.png
    ../3d-landing/male0155.png
    ../3d-landing/male0156.png
    ../3d-landing/male0157.png
    ../3d-landing/male0158.png
    ../3d-landing/male0159.png
    ../3d-landing/male0160.png
    ../3d-landing/male0161.png
    ../3d-landing/male0162.png
    ../3d-landing/male0163.png
    ../3d-landing/male0164.png
    ../3d-landing/male0165.png
    ../3d-landing/male0166.png
    ../3d-landing/male0167.png
    ../3d-landing/male0168.png
    ../3d-landing/male0169.png
    ../3d-landing/male0170.png
    ../3d-landing/male0171.png
    ../3d-landing/male0172.png
    ../3d-landing/male0173.png
    ../3d-landing/male0174.png
    ../3d-landing/male0175.png
    ../3d-landing/male0176.png
    ../3d-landing/male0177.png
    ../3d-landing/male0178.png
    ../3d-landing/male0179.png
    ../3d-landing/male0180.png
    ../3d-landing/male0181.png
    ../3d-landing/male0182.png
    ../3d-landing/male0183.png
    ../3d-landing/male0184.png
    ../3d-landing/male0185.png
    ../3d-landing/male0186.png
    ../3d-landing/male0187.png
    ../3d-landing/male0188.png
    ../3d-landing/male0189.png
    ../3d-landing/male0190.png
    ../3d-landing/male0191.png
    ../3d-landing/male0192.png
    ../3d-landing/male0193.png
    ../3d-landing/male0194.png
    ../3d-landing/male0195.png
    ../3d-landing/male0196.png
    ../3d-landing/male0197.png
    ../3d-landing/male0198.png
    ../3d-landing/male0199.png
    ../3d-landing/male0200.png
    ../3d-landing/male0201.png
    ../3d-landing/male0202.png
    ../3d-landing/male0203.png
    ../3d-landing/male0204.png
    ../3d-landing/male0205.png
    ../3d-landing/male0206.png
    ../3d-landing/male0207.png
    ../3d-landing/male0208.png
    ../3d-landing/male0209.png
    ../3d-landing/male0210.png
    ../3d-landing/male0211.png
    ../3d-landing/male0212.png
    ../3d-landing/male0213.png
    ../3d-landing/male0214.png
    ../3d-landing/male0215.png
    ../3d-landing/male0216.png
    ../3d-landing/male0217.png
    ../3d-landing/male0218.png
    ../3d-landing/male0219.png
    ../3d-landing/male0220.png
    ../3d-landing/male0221.png
    ../3d-landing/male0222.png
    ../3d-landing/male0223.png
    ../3d-landing/male0224.png
    ../3d-landing/male0225.png
    ../3d-landing/male0226.png
    ../3d-landing/male0227.png
    ../3d-landing/male0228.png
    ../3d-landing/male0229.png
    ../3d-landing/male0230.png
    ../3d-landing/male0231.png
    ../3d-landing/male0232.png
    ../3d-landing/male0233.png
    ../3d-landing/male0234.png
    ../3d-landing/male0235.png
    ../3d-landing/male0236.png
    ../3d-landing/male0237.png
    ../3d-landing/male0238.png
    ../3d-landing/male0239.png
    ../3d-landing/male0240.png
    ../3d-landing/male0241.png
    ../3d-landing/male0242.png
    ../3d-landing/male0243.png
    ../3d-landing/male0244.png
    ../3d-landing/male0245.png
    ../3d-landing/male0246.png
    ../3d-landing/male0247.png
    ../3d-landing/male0248.png
    ../3d-landing/male0249.png
    ../3d-landing/male0250.png
    ../3d-landing/male0251.png
    ../3d-landing/male0252.png
    ../3d-landing/male0253.png
    ../3d-landing/male0254.png
    ../3d-landing/male0255.png
    ../3d-landing/male0256.png
    ../3d-landing/male0257.png
    ../3d-landing/male0258.png
    ../3d-landing/male0259.png
    ../3d-landing/male0260.png
    ../3d-landing/male0261.png
    ../3d-landing/male0262.png
    ../3d-landing/male0263.png
    ../3d-landing/male0264.png
    ../3d-landing/male0265.png
    ../3d-landing/male0266.png
    ../3d-landing/male0267.png
    ../3d-landing/male0268.png
    ../3d-landing/male0269.png
    ../3d-landing/male0270.png
    ../3d-landing/male0271.png
    ../3d-landing/male0272.png
    ../3d-landing/male0273.png
    ../3d-landing/male0274.png
    ../3d-landing/male0275.png
    ../3d-landing/male0276.png
    ../3d-landing/male0277.png
    ../3d-landing/male0278.png
    ../3d-landing/male0279.png
    ../3d-landing/male0280.png
    ../3d-landing/male0281.png
    ../3d-landing/male0282.png
    ../3d-landing/male0283.png
    ../3d-landing/male0284.png
    ../3d-landing/male0285.png
    ../3d-landing/male0286.png
    ../3d-landing/male0287.png
    ../3d-landing/male0288.png
    ../3d-landing/male0289.png
    ../3d-landing/male0290.png
    ../3d-landing/male0291.png
    ../3d-landing/male0292.png
    ../3d-landing/male0293.png
    ../3d-landing/male0294.png
    ../3d-landing/male0295.png
    ../3d-landing/male0296.png
    ../3d-landing/male0297.png
    ../3d-landing/male0298.png
    ../3d-landing/male0299.png
    ../3d-landing/male0300.png
 `;
  return data.split("\n")[index];
}

const frameCount = 300;

const images = [];
const imageSeq = {
  frame: 1,
};

for (let i = 0; i < frameCount; i++) {
  const img = new Image();
  img.src = files(i);
  images.push(img);
}

gsap.to(imageSeq, {
  frame: frameCount - 1,
  snap: "frame",
  ease: `none`,
  scrollTrigger: {
    scrub: 0.15,
    trigger: `#page>canvas`,
    start: `top top`,
    end: `600% top`,
    scroller: `#main`,
  },
  onUpdate: render,
});

images[1].onload = render;

function render() {
  scaleImage(images[imageSeq.frame], context);
}

function scaleImage(img, ctx) {
  var canvas = ctx.canvas;
  var hRatio = canvas.width / img.width;
  var vRatio = canvas.height / img.height;
  var ratio = Math.max(hRatio, vRatio);
  var centerShift_x = (canvas.width - img.width * ratio) / 2;
  var centerShift_y = (canvas.height - img.height * ratio) / 2;
  ctx.clearRect(0, 0, canvas.width, canvas.height);
  ctx.drawImage(
    img,
    0,
    0,
    img.width,
    img.height,
    centerShift_x,
    centerShift_y,
    img.width * ratio,
    img.height * ratio
  );
}
ScrollTrigger.create({
  trigger: "#page>canvas",
  pin: true,
  // markers:true,
  scroller: `#main`,
  start: `top top`,
  end: `600% top`,
});



gsap.to("#page1",{
  scrollTrigger:{
    trigger:`#page1`,
    start:`top top`,
    end:`bottom top`,
    pin:true,
    scroller:`#main`
  }
})
gsap.to("#page2",{
  scrollTrigger:{
    trigger:`#page2`,
    start:`top top`,
    end:`bottom top`,
    pin:true,
    scroller:`#main`
  }
})
gsap.to("#page3",{
  scrollTrigger:{
    trigger:`#page3`,
    start:`top top`,
    end:`bottom top`,
    pin:true,
    scroller:`#main`
  }
})
