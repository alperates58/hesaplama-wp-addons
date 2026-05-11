function hcAvHesapla() {
    const planned = parseFloat(document.getElementById('hc-av-planned').value);
    const downtime = parseFloat(document.getElementById('hc-av-downtime').value);

    if (isNaN(planned) || isNaN(downtime) || planned <= 0) {
        alert('Lütfen geçerli süre değerleri girin.');
        return;
    }

    if (downtime > planned) {
        alert('Duruş süresi planlanan süreden büyük olamaz.');
        return;
    }

    const availability = ((planned - downtime) / planned) * 100;

    document.getElementById('hc-av-res-total').innerText = availability.toLocaleString('tr-TR', { maximumFractionDigits: 1 });
    
    const status = document.getElementById('hc-av-status');
    if (availability >= 90) {
        status.innerText = "Yüksek Kullanılabilirlik";
        status.style.color = "#2ecc71";
    } else if (availability >= 70) {
        status.innerText = "Orta Seviye";
        status.style.color = "#f39c12";
    } else {
        status.innerText = "Düşük Kullanılabilirlik - İyileştirme Gerekli";
        status.style.color = "#e74c3c";
    }

    document.getElementById('hc-av-result').classList.add('visible');
}
