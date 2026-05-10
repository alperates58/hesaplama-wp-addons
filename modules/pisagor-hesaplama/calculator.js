function hcPythHesapla() {
    let a = parseFloat(document.getElementById('hc-py-a').value);
    let b = parseFloat(document.getElementById('hc-py-b').value);
    let c = parseFloat(document.getElementById('hc-py-c').value);

    let filled = [a, b, c].filter(x => !isNaN(x)).length;

    if (filled !== 2) {
        alert('Lütfen hesaplama yapmak için tam olarak iki kenarı doldurunuz.');
        return;
    }

    let result = 0;
    if (isNaN(c)) {
        result = Math.sqrt(a * a + b * b);
    } else if (isNaN(a)) {
        if (c <= b) { alert('Hipotenüs dik kenardan küçük olamaz.'); return; }
        result = Math.sqrt(c * c - b * b);
    } else if (isNaN(b)) {
        if (c <= a) { alert('Hipotenüs dik kenardan küçük olamaz.'); return; }
        result = Math.sqrt(c * c - a * a);
    }

    document.getElementById('hc-py-res-val').innerText = result.toLocaleString('tr-TR', { maximumFractionDigits: 4 });
    document.getElementById('hc-pisagor-result').classList.add('visible');
}
