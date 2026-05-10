function hcHypotenuseHesapla() {
    const a = parseFloat(document.getElementById('hc-hp-a').value);
    const b = parseFloat(document.getElementById('hc-hp-b').value);

    if (!a || !b) {
        alert('Lütfen kenar uzunluklarını giriniz.');
        return;
    }

    const c = Math.sqrt(Math.pow(a, 2) + Math.pow(b, 2));

    document.getElementById('hc-hp-res-val').innerText = c.toLocaleString('tr-TR', { maximumFractionDigits: 4 });
    document.getElementById('hc-hypotenuse-result').classList.add('visible');
}
