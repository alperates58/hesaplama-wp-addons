function hcSoilPollutionHesapla() {
    const ci = parseFloat(document.getElementById('hc-sp-c').value) || 0;
    const si = parseFloat(document.getElementById('hc-sp-s').value) || 1;

    const pi = ci / si;
    const valEl = document.getElementById('hc-res-sp-val');
    const statusEl = document.getElementById('hc-sp-status');

    valEl.innerText = pi.toLocaleString('tr-TR', { maximumFractionDigits: 2 });

    if (pi > 3) {
        statusEl.innerText = "Yüksek Kirlilik";
        statusEl.style.color = "#c0392b";
    } else if (pi > 1) {
        statusEl.innerText = "Kirlilik Başlangıcı / Orta Derece";
        statusEl.style.color = "#d35400";
    } else {
        statusEl.innerText = "Temiz / Normal";
        statusEl.style.color = "#27ae60";
    }

    document.getElementById('hc-soil-pollution-result').classList.add('visible');
}
