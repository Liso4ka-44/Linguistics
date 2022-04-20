function asyncGeneratorStep(e, t, r, o, a, n, c) { try { var l = e[n](c),
            d = l.value } catch (e) { return void r(e) }
    l.done ? t(d) : Promise.resolve(d).then(o, a) }

function _asyncToGenerator(e) { return function() { var t = this,
            r = arguments; return new Promise((function(o, a) { var n = e.apply(t, r);

            function c(e) { asyncGeneratorStep(n, o, a, c, l, "next", e) }

            function l(e) { asyncGeneratorStep(n, o, a, c, l, "throw", e) }
            c(void 0) })) } }
var parseJSON = e => { var t = null; try { t = JSON.parse(e) } catch (e) { return null } return t },
    hidePopup = e => { e.style.display = "none", document.body.style.overflow = null },
    showPopup = function(e) { var t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : "block";
        e.style.display = t, document.body.style.overflow = "hidden" },
    init = e => { Array.from(document.querySelectorAll('[data-anchor]:not([data-anchor=""])')).forEach((e => { e.addEventListener("click", (t => { t.preventDefault(); var r = e.dataset.anchor,
                    o = Array.from(document.querySelectorAll("[data-style]")).find((e => e.dataset.style.includes(r))); if (o) { var a = document.body.getBoundingClientRect(),
                        n = o.getBoundingClientRect().top - a.top;
                    window.scrollTo({ top: n, behavior: "smooth" }) } })) })); var t = Array.from(document.querySelectorAll('[data-popup]:not([data-popup=""])')),
            r = Array.from(document.querySelectorAll("[data-style]"));
        t.forEach((e => { var t = e.dataset.popup,
                o = r.find((e => e.dataset.style === t)); if (o) { var a = o.querySelector('[data-script="form"]');
                e.addEventListener("click", (t => { t.preventDefault(); var r = parseJSON(e.dataset.order); if (a && r) { var n = localStorage.forms && JSON.parse(localStorage.forms) || {};
                        n[a.id] = [r], localStorage.setItem("forms", JSON.stringify(n)) }
                    showPopup(o.querySelector("[data-popup-element]")) })) } })); var o = document.querySelectorAll("[data-popup-element]");
        Array.from(o).forEach((e => { e.classList.add("cli-show-popup"), e.querySelector("[data-popup-close]").addEventListener("click", (t => { t.preventDefault(), hidePopup(e) })), e.addEventListener("click", (t => { t.target === e && hidePopup(e) })) })), Array.from(document.querySelectorAll('[data-cart="true"]')).forEach((t => { var r = document.querySelector('[data-script="cart"]'); if (r) { var o = r.closest("[data-style]").querySelector('[data-script="form"]');
                t.addEventListener("click", function() { var r = _asyncToGenerator((function*(r) { r.preventDefault(); var a = parseJSON(t.dataset.order); if (o && a) { var n = e.find((e => e.startsWith("module-cart."))),
                                { addProductToCart: c } = yield
                            import ("./".concat(n));
                            console.log(c), c(a) } })); return function(e) { return r.apply(this, arguments) } }()) } })) };
export { parseJSON, hidePopup, showPopup };
export default init;