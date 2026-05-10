function hcBeamLoadHesapla() {
    const L = parseFloat(document.getElementById('hc-bl-len').value);
    const P = parseFloat(document.getElementById('hc-bl-load').value);
    const a = parseFloat(document.getElementById('hc-bl-dist').value);

    if (!L || !P || a > L) {
        alert('Lütfen geçerli ölçüler giriniz.');
        return;
    }

    const b = L - a;
    const Ra = (P * b) / L;
    const Rb = (P * a) / L;

    document.getElementById('hc-bl-res-ra').innerText = Ra.toFixed(2).toLocaleString('tr-TR');
    document.getElementById('hc-bl-res-rb').innerText = Rb.toFixed(2).toLocaleString('tr-TR');

    document.getElementById('hc-beam-load-result').classList.add('visible');
}
