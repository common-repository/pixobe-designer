let e,n,t=!1,l=!1;const o={},s=e=>"object"==(e=typeof e)||"function"===e;function i(e){var n,t,l;return null!==(l=null===(t=null===(n=e.head)||void 0===n?void 0:n.querySelector('meta[name="csp-nonce"]'))||void 0===t?void 0:t.getAttribute("content"))&&void 0!==l?l:void 0}const r=(e,n,...t)=>{let l=null,o=!1,i=!1;const r=[],u=n=>{for(let t=0;t<n.length;t++)l=n[t],Array.isArray(l)?u(l):null!=l&&"boolean"!=typeof l&&((o="function"!=typeof e&&!s(l))&&(l+=""),o&&i?r[r.length-1].t+=l:r.push(o?c(null,l):l),i=o)};if(u(t),n){const e=n.className||n.class;e&&(n.class="object"!=typeof e?e:Object.keys(e).filter((n=>e[n])).join(" "))}const a=c(e,null);return a.l=n,r.length>0&&(a.o=r),a},c=(e,n)=>({i:0,u:e,t:n,h:null,o:null,l:null}),u={},a=e=>R(e).p,f=new WeakMap,d=e=>"sc-"+e.$,h=(e,n,t,l,o,i)=>{if(t!==l){let r=q(e,n),c=n.toLowerCase();if("class"===n){const n=e.classList,o=$(t),s=$(l);n.remove(...o.filter((e=>e&&!s.includes(e)))),n.add(...s.filter((e=>e&&!o.includes(e))))}else if(r||"o"!==n[0]||"n"!==n[1]){const c=s(l);if((r||c&&null!==l)&&!o)try{if(e.tagName.includes("-"))e[n]=l;else{const o=null==l?"":l;"list"===n?r=!1:null!=t&&e[n]==o||(e[n]=o)}}catch(e){}null==l||!1===l?!1===l&&""!==e.getAttribute(n)||e.removeAttribute(n):(!r||4&i||o)&&!c&&e.setAttribute(n,l=!0===l?"":l)}else n="-"===n[2]?n.slice(3):q(z,c)?c.slice(2):c[2]+n.slice(3),t&&G.rel(e,n,t,!1),l&&G.ael(e,n,l,!1)}},p=/\s/,$=e=>e?e.split(p):[],m=(e,n,t,l)=>{const s=11===n.h.nodeType&&n.h.host?n.h.host:n.h,i=e&&e.l||o,r=n.l||o;for(l in i)l in r||h(s,l,i[l],void 0,t,n.i);for(l in r)h(s,l,i[l],r[l],t,n.i)},y=(n,l,o)=>{const s=l.o[o];let i,r,c=0;if(null!==s.t)i=s.h=B.createTextNode(s.t);else{if(t||(t="svg"===s.u),i=s.h=B.createElementNS(t?"http://www.w3.org/2000/svg":"http://www.w3.org/1999/xhtml",s.u),t&&"foreignObject"===s.u&&(t=!1),m(null,s,t),null!=e&&i["s-si"]!==e&&i.classList.add(i["s-si"]=e),s.o)for(c=0;c<s.o.length;++c)r=y(n,s,c),r&&i.appendChild(r);"svg"===s.u?t=!1:"foreignObject"===i.tagName&&(t=!0)}return i},w=(e,t,l,o,s,i)=>{let r,c=e;for(c.shadowRoot&&c.tagName===n&&(c=c.shadowRoot);s<=i;++s)o[s]&&(r=y(null,l,s),r&&(o[s].h=r,c.insertBefore(r,t)))},b=(e,n,t,l)=>{for(;n<=t;++n)(l=e[n])&&l.h.remove()},v=(e,n)=>e.u===n.u,g=(e,n)=>{const l=n.h=e.h,o=e.o,s=n.o,i=n.u,r=n.t;null===r?(t="svg"===i||"foreignObject"!==i&&t,m(e,n,t),null!==o&&null!==s?((e,n,t,l)=>{let o,s=0,i=0,r=n.length-1,c=n[0],u=n[r],a=l.length-1,f=l[0],d=l[a];for(;s<=r&&i<=a;)null==c?c=n[++s]:null==u?u=n[--r]:null==f?f=l[++i]:null==d?d=l[--a]:v(c,f)?(g(c,f),c=n[++s],f=l[++i]):v(u,d)?(g(u,d),u=n[--r],d=l[--a]):v(c,d)?(g(c,d),e.insertBefore(c.h,u.h.nextSibling),c=n[++s],d=l[--a]):v(u,f)?(g(u,f),e.insertBefore(u.h,c.h),u=n[--r],f=l[++i]):(o=y(n&&n[i],t,i),f=l[++i],o&&c.h.parentNode.insertBefore(o,c.h));s>r?w(e,null==l[a+1]?null:l[a+1].h,t,l,i,a):i>a&&b(n,s,r)})(l,o,n,s):null!==s?(null!==e.t&&(l.textContent=""),w(l,null,n,s,0,s.length-1)):null!==o&&b(o,0,o.length-1),t&&"svg"===i&&(t=!1)):e.t!==r&&(l.data=r)},S=(e,n)=>{n&&!e.m&&n["s-p"]&&n["s-p"].push(new Promise((n=>e.m=n)))},j=(e,n)=>{if(e.i|=16,!(4&e.i))return S(e,e.v),ne((()=>O(e,n)));e.i|=512},O=(e,n)=>{const t=e.g;return E(void 0,(()=>M(e,t,n)))},M=async(e,n,t)=>{const l=e.p,o=l["s-rc"];t&&(e=>{const n=e.S,t=e.p,l=n.i,o=((e,n)=>{var t;let l=d(n);const o=_.get(l);if(e=11===e.nodeType?e:B,o)if("string"==typeof o){let n,s=f.get(e=e.head||e);if(s||f.set(e,s=new Set),!s.has(l)){{n=B.createElement("style"),n.innerHTML=o;const l=null!==(t=G.j)&&void 0!==t?t:i(B);null!=l&&n.setAttribute("nonce",l),e.insertBefore(n,e.querySelector("link"))}s&&s.add(l)}}else e.adoptedStyleSheets.includes(o)||(e.adoptedStyleSheets=[...e.adoptedStyleSheets,o]);return l})(t.shadowRoot?t.shadowRoot:t.getRootNode(),n);10&l&&(t["s-sc"]=o,t.classList.add(o+"-h"))})(e);k(e,n),o&&(o.map((e=>e())),l["s-rc"]=void 0);{const n=l["s-p"],t=()=>C(e);0===n.length?t():(Promise.all(n).then(t),e.i|=4,n.length=0)}},k=(t,l)=>{try{l=l.render(),t.i&=-17,t.i|=2,((t,l)=>{const o=t.p,s=t.O||c(null,null),i=(e=>e&&e.u===u)(l)?l:r(null,null,l);n=o.tagName,i.u=null,i.i|=4,t.O=i,i.h=s.h=o.shadowRoot||o,e=o["s-sc"],g(s,i)})(t,l)}catch(e){D(e,t.p)}return null},C=e=>{const n=e.p,t=e.g,l=e.v;64&e.i||(e.i|=64,L(n),P(t,"componentDidLoad"),e.M(n),l||x()),e.m&&(e.m(),e.m=void 0),512&e.i&&ee((()=>j(e,!1))),e.i&=-517},x=()=>{L(B.documentElement),ee((()=>(e=>{const n=G.ce("appload",{detail:{namespace:"pixobe-designer"}});return e.dispatchEvent(n),n})(z)))},P=(e,n,t)=>{if(e&&e[n])try{return e[n](t)}catch(e){D(e)}},E=(e,n)=>e&&e.then?e.then(n):n(),L=e=>e.classList.add("hydrated"),N=(e,n,t)=>{if(n.k){const l=Object.entries(n.k),o=e.prototype;if(l.map((([e,[l]])=>{(31&l||2&t&&32&l)&&Object.defineProperty(o,e,{get(){return((e,n)=>R(this).C.get(n))(0,e)},set(t){((e,n,t,l)=>{const o=R(e),i=o.C.get(n),r=o.i,c=o.g;t=((e,n)=>null==e||s(e)?e:1&n?e+"":e)(t,l.k[n][0]),8&r&&void 0!==i||t===i||Number.isNaN(i)&&Number.isNaN(t)||(o.C.set(n,t),c&&2==(18&r)&&j(o,!1))})(this,e,t,n)},configurable:!0,enumerable:!0})})),1&t){const n=new Map;o.attributeChangedCallback=function(e,t,l){G.jmp((()=>{const t=n.get(e);if(this.hasOwnProperty(t))l=this[t],delete this[t];else if(o.hasOwnProperty(t)&&"number"==typeof this[t]&&this[t]==l)return;this[t]=(null!==l||"boolean"!=typeof this[t])&&l}))},e.observedAttributes=l.filter((([e,n])=>15&n[0])).map((([e,t])=>{const l=t[1]||e;return n.set(l,e),l}))}}return e},T=(e,n={})=>{var t;const l=[],o=n.exclude||[],s=z.customElements,r=B.head,c=r.querySelector("meta[charset]"),u=B.createElement("style"),a=[];let f,h=!0;Object.assign(G,n),G.P=new URL(n.resourcesUrl||"./",B.baseURI).href,e.map((e=>{e[1].map((n=>{const t={i:n[0],$:n[1],k:n[2],L:n[3]};t.k=n[2];const i=t.$,r=class extends HTMLElement{constructor(e){super(e),W(e=this,t),1&t.i&&e.attachShadow({mode:"open"})}connectedCallback(){f&&(clearTimeout(f),f=null),h?a.push(this):G.jmp((()=>(e=>{if(0==(1&G.i)){const n=R(e),t=n.S,l=()=>{};if(!(1&n.i)){n.i|=1;{let t=e;for(;t=t.parentNode||t.host;)if(t["s-p"]){S(n,n.v=t);break}}t.k&&Object.entries(t.k).map((([n,[t]])=>{if(31&t&&e.hasOwnProperty(n)){const t=e[n];delete e[n],e[n]=t}})),(async(e,n,t,l,o)=>{if(0==(32&n.i)){{if(n.i|=32,(o=V(t)).then){const e=()=>{};o=await o,e()}o.isProxied||(N(o,t,2),o.isProxied=!0);const e=()=>{};n.i|=8;try{new o(n)}catch(e){D(e)}n.i&=-9,e()}if(o.style){let e=o.style;const n=d(t);if(!_.has(n)){const l=()=>{};((e,n,t)=>{let l=_.get(e);J&&t?(l=l||new CSSStyleSheet,"string"==typeof l?l=n:l.replaceSync(n)):l=n,_.set(e,l)})(n,e,!!(1&t.i)),l()}}}const s=n.v,i=()=>j(n,!0);s&&s["s-rc"]?s["s-rc"].push(i):i()})(0,n,t)}l()}})(this)))}disconnectedCallback(){G.jmp((()=>{}))}componentOnReady(){return R(this).N}};t.T=e[0],o.includes(i)||s.get(i)||(l.push(i),s.define(i,N(r,t,1)))}))}));{u.innerHTML=l+"{visibility:hidden}.hydrated{visibility:inherit}",u.setAttribute("data-styles","");const e=null!==(t=G.j)&&void 0!==t?t:i(B);null!=e&&u.setAttribute("nonce",e),r.insertBefore(u,c?c.nextSibling:r.firstChild)}h=!1,a.length?a.map((e=>e.connectedCallback())):G.jmp((()=>f=setTimeout(x,30)))},A=e=>G.j=e,H=new WeakMap,R=e=>H.get(e),U=(e,n)=>H.set(n.g=e,n),W=(e,n)=>{const t={i:0,p:e,S:n,C:new Map};return t.N=new Promise((e=>t.M=e)),e["s-p"]=[],e["s-rc"]=[],H.set(e,t)},q=(e,n)=>n in e,D=(e,n)=>(0,console.error)(e,n),F=new Map,V=e=>{const n=e.$.replace(/-/g,"_"),t=e.T,l=F.get(t);return l?l[n]:import(`./${t}.entry.js`).then((e=>(F.set(t,e),e[n])),D)
/*!__STENCIL_STATIC_IMPORT_SWITCH__*/},_=new Map,z="undefined"!=typeof window?window:{},B=z.document||{head:{}},G={i:0,P:"",jmp:e=>e(),raf:e=>requestAnimationFrame(e),ael:(e,n,t,l)=>e.addEventListener(n,t,l),rel:(e,n,t,l)=>e.removeEventListener(n,t,l),ce:(e,n)=>new CustomEvent(e,n)},I=e=>Promise.resolve(e),J=(()=>{try{return new CSSStyleSheet,"function"==typeof(new CSSStyleSheet).replaceSync}catch(e){}return!1})(),K=[],Q=[],X=(e,n)=>t=>{e.push(t),l||(l=!0,n&&4&G.i?ee(Z):G.raf(Z))},Y=e=>{for(let n=0;n<e.length;n++)try{e[n](performance.now())}catch(e){D(e)}e.length=0},Z=()=>{Y(K),Y(Q),(l=K.length>0)&&G.raf(Z)},ee=e=>I().then(e),ne=X(Q,!0);export{u as H,T as b,a as g,r as h,I as p,U as r,A as s}