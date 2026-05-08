function hcDevHesapla() {
    const unexcused = parseFloat(document.getElementById('hc-dev-unexcused').value) || 0;
    const excused = parseFloat(document.getElementById('hc-dev-excused').value) || 0;

    const total = unexcused + excused;
    
    const remUnexcused = 10 - unexcused;
    const remTotal = 30 - total;

    document.getElementById('hc-dev-rem-unexcused').innerText = (remUnexcused >= 0 ? remUnexcused : 0) + " gün";
    document.getElementById('hc-dev-rem-total').innerText = (remTotal >= 0 ? remTotal : 0) + " gün";

    const statusEl = document.getElementById('hc-dev-status');
    if (unexcused > 10 || total > 30) {
        statusEl.innerText = "Sınıf Tekrarı Riski!";
        statusEl.style.color = "red";
    } else {
        statusEl.innerText = "Güvenli Aralıktasınız";
        statusEl.style.color = "green";
    }

    document.getElementById('hc-dev-result').classList.add('visible');
}
