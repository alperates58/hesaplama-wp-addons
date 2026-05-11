function hcOzIsiHesapla() {
    const q = parseFloat(document.getElementById('hc-oi-heat').value);
    const m = parseFloat(document.getElementById('hc-oi-mass').value);
    const dt = parseFloat(document.getElementById('hc-oi-temp').value);

    if (isNaN(q) || isNaN(m) || isNaN(dt) || m === 0 || dt === 0) {
        alert('Lütfen geçerli değerler girin (Kütle ve sıcaklık farkı sıfır olamaz).');
        return;
    }

    // c = Q / (m * ΔT)
    const c = q / (m * dt);

    document.getElementById('hc-oi-res-total').innerText = c.toLocaleString('tr-TR', { maximumFractionDigits: 4 });
    document.getElementById('hc-oi-result').classList.add('visible');
}
