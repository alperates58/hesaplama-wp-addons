function hcPastorHesapla() {
    const f = parseFloat(document.getElementById('hc-ps-target-f').value);
    const t = parseFloat(document.getElementById('hc-ps-temp').value);
    const tref = parseFloat(document.getElementById('hc-ps-tref').value);
    const z = parseFloat(document.getElementById('hc-ps-z').value);

    if (isNaN(f) || isNaN(t) || isNaN(tref) || isNaN(z) || z <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    // F = t * 10^((T - Tref) / z)
    // t = F / 10^((T - Tref) / z)
    const power = (t - tref) / z;
    const l_factor = Math.pow(10, power);
    const time_min = f / l_factor;
    const time_sec = time_min * 60;

    document.getElementById('hc-ps-res-total').innerText = time_min.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    document.getElementById('hc-ps-res-sec').innerText = Math.ceil(time_sec).toLocaleString('tr-TR');

    document.getElementById('hc-ps-result').classList.add('visible');
}
