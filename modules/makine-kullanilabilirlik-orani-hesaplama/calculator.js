function hcMakineKullanilabilirlikHesapla() {
    const planned = parseFloat(document.getElementById('hc-avail-planned').value);
    const downtime = parseFloat(document.getElementById('hc-avail-downtime').value);

    if (isNaN(planned) || isNaN(downtime) || planned <= 0) {
        alert('Lütfen geçerli değerler girin (Planlanan süre 0\'dan büyük olmalıdır).');
        return;
    }

    if (downtime > planned) {
        alert('Duruş süresi planlanan süreden büyük olamaz.');
        return;
    }

    const operatingTime = planned - downtime;
    const ratio = (operatingTime / planned) * 100;

    document.getElementById('hc-res-avail-ratio').innerText = '%' + ratio.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    
    let desc = "";
    if (ratio >= 90) {
        desc = "Mükemmel kullanılabilirlik oranı. Dünya standartlarında (OEE > %90).";
    } else if (ratio >= 75) {
        desc = "İyi düzeyde kullanılabilirlik. Geliştirme fırsatları olabilir.";
    } else {
        desc = "Düşük kullanılabilirlik oranı. Duruş nedenleri (arıza, kurulum vb.) analiz edilmelidir.";
    }
    
    document.getElementById('hc-avail-desc').innerText = desc;
    document.getElementById('hc-makine-kullanilabilirlik-result').classList.add('visible');
}
