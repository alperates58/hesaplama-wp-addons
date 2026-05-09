function hcKnotToKmh() {
    const knot = parseFloat(document.getElementById('hc-knkm-knot').value);
    if (isNaN(knot)) return;
    document.getElementById('hc-knkm-kmh').value = (knot * 1.852).toFixed(4);
}

function hcKmhToKnot() {
    const kmh = parseFloat(document.getElementById('hc-knkm-kmh').value);
    if (isNaN(kmh)) return;
    document.getElementById('hc-knkm-knot').value = (kmh / 1.852).toFixed(4);
}
