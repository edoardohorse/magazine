const DOMAIN_RB = "https://rbcasting.com/rb";
const URL_CASTLIST = (start, end)=>{ return `/api/jsonws/rb.castlist/get-public-group-cast-lists/start/${start}/end/${end}`}
const URL_NEWS = (x)=>{return `./getNews.php?nPosts=${x}`}
// const URL_LINKS = `./links.json`;
const CLASS_CASTING_PRIMARY = "casting_images--primary"
const CLASS_CASTING_SECONDARY = "casting_images--secondary"
const CLASS_CASTING_TERTIARY = "casting_images--tertiary"

const N_CASTLIST = 6
const N_NEWS = 6
let castlist, magazine, news = null


async function loadCastlist(start = 0, end = N_CASTLIST) {
  const url = DOMAIN_RB + URL_CASTLIST(start, end);
  return fetch(url)
    .then((data) => data.json())
    .then((json) => json);
}

async function loadLang(code = "it") {
    if(document.documentElement.getAttribute("lang") == code) return 

  document.documentElement.setAttribute("lang", code);
  const url = URL_LANG(document.documentElement.lang);
  const liChoosen = document.querySelector(`.flag-${code}`);
  if(document.querySelector('.flag--hide')){
    document.querySelector(".flag--hide").classList.remove('flag--hide');
  }

  document.getElementById("languageSelected").innerHTML = null
  document.getElementById("languageSelected").appendChild(liChoosen.cloneNode(true))
  liChoosen.classList.add('flag--hide');
  return fetch(url)
    .then((data) => data.json())
    .then((lang) => injectLang(lang))
}

async function loadNews(){
  const url = URL_NEWS(N_NEWS)
   return fetch(url)
     .then((data) => data.json())
     .then((json) => json);
}


function injectLang(lang) {
    // debugger;
    const inject = (el, lang) => {
        const key = el.getAttribute(ATTRIBUTE_ELEMENT_CONTENT);
        const value = lang[key] || null;
        if(Array.isArray(value)){
          el.innerHTML = ""
          value.forEach(lnk=>{
              el.innerHTML += newLinkTertiarty(lnk)
            })
        }
        else if (value) {
            if (el.hasAttribute(ATTRIBUTE_ELEMENT_ATTR)) {
                el.setAttribute(el.getAttribute(ATTRIBUTE_ELEMENT_ATTR), value);
            } else
                el.innerHTML = value;
        }
    };

    const els = Array.from(document.querySelectorAll(`[${ATTRIBUTE_ELEMENT_CONTENT}]`));
    els.forEach((el) => inject(el, lang));

    console.info(`${Object.keys(lang).length} label injected`, lang);
}

async function loadLinks(){
    return fetch(URL_LINKS)
      .then((data) => data.json())
      .then((links) => injectLinks(links));

}

async function injectLinks(links) {
  const inject = (el, links) => {
    const key = el.getAttribute(ATTRIBUTE_ELEMENT_CONTENT);
    const value = key in links? links[key] : null;
    if (value) {
      el.href = value;
    }
  };

  const els = Array.from(
    document.querySelectorAll(`a[${ATTRIBUTE_ELEMENT_CONTENT}]`)
  );
  els.forEach((el) => inject(el, links));

  console.info(`${Object.keys(links).length} links injected`, links);
}

function newHoverableImage(image){
    return  `<a href="${image.url}" class="hoverable">
                <img src="${DOMAIN_RB + image.posterId}">
                <span>${image.title}</span>
            </a>`;
}

function newLinkTertiarty(lnk){
  return `<a class="btn_lnk btn_lnk--tertiary" target="_top" ${ATTRIBUTE_ELEMENT_CONTENT}="${lnk.url}">${lnk.label}</a>`;
}

function injectCastlist(castlist){
    const el= document.getElementById("casting_images")
    el.innerHTML = ""
    let primary, secondary, tertiary

    

    if(castlist.length > 0){
        primary = document.createElement("div"); primary.classList.add(CLASS_CASTING_PRIMARY);
        primary.innerHTML = newHoverableImage(castlist[0], true)
        el.appendChild(primary)
    }
    
    if(castlist.length > 1){
        secondary = document.createElement("div"); secondary.classList.add(CLASS_CASTING_SECONDARY);
        castlist.slice(1,3).forEach(c=>{
            secondary.innerHTML += newHoverableImage(c)
        })
        primary.appendChild(secondary)
    }

    if (castlist.length > 3) {
        tertiary = document.createElement("div");
        tertiary.classList.add(CLASS_CASTING_TERTIARY);
        castlist.slice(3).forEach((c) => {
            tertiary.innerHTML += newHoverableImage(c);
        });
        el.appendChild(tertiary);
    }
}

function injectNews(news){
  const list = document.getElementById("slideshow_magazine_list");
  for(let post of news){
    list.innerHTML += `
    <li class="splide__slide">
        <div class="slideshow_slide">
            <img src="${post.image}">
            <div class="slideshow_label">
              <a href="${post.url}" >${post.title}</a>
            </div>
        </div>
    </li>`;
  }
}

function loadMagazine(){
    new Splide(".splide", {
      perPage: 3,
      height: 270,
      gap: 5,
      padding: { left: 40, right: 40 },
      breakpoints: {
        1100: {
          perPage: 2,
        },
        770: {
          perPage: 1,
          padding: { left: 0, right: 0 },
        },
      },
      // width:1380,
      // arrows: {"prev":document.querySelector(".btn_prev"), next: document.querySelector(".btn_next")},
      // fixedWidth:300,
      // fixedHeight:130,
      // fixedWidth:480,
      // pagination: true,
      // autoWidth: true
    }).mount();
}



async function init(){
    // await loadLang()
    // links    = await loadLinks()
    castlist = await loadCastlist()
    news = await loadNews()
    injectNews(news)
    magazine = await loadMagazine()
    console.log("news",news)

    // console.log(lang)
    
    injectCastlist(castlist)
    // injectLinks(links)
    // injectMagazine(magazine)
}



window.addEventListener('DOMContentLoaded',init)