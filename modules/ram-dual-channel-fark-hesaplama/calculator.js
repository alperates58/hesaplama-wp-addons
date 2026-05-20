function hcRamNesilDegisti() {
    var nesil = document.getElementById('hc-ram-nesil').value;
    var frekans = document.getElementById('hc-ram-frekans');
    if (nesil === 'ddr5' && frekans.value === '3200') {
        frekans.value = '5600';
    } else if (nesil === 'ddr4' && frekans.value === '5600') {
        frekans.value = '3200';
    }
}

function hcRamDualChannelFarkHesapla() {
    var frekans = parseFloat(document.getElementById('hc-ram-frekans').value);
    var nesil = document.getElementById('hc-ram-nesil').value;
    var senaryo = document.getElementById('hc-ram-senaryo').value;

    if (!frekans || frekans <= 0) {
        alert('Lütfen geçerli bir RAM frekansı girin.');
        return;
    }

    // Teorik Bant Genişliği (GB/sn)
    // DDR RAM'ler saat döngüsü başına iki transfer yaptığı için 
    // Bant Genişliği (Tek Kanal) = Frekans * 8 Byte / 1000 (DDR etkindir)
    // Bant Genişliği (Çift Kanal) = Frekans * 16 Byte / 1000
    var tekBant = (frekans * 8) / 1000;
    var ciftBant = (frekans * 16) / 1000;

    var fmtSayi = function(val) {
        return val.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' GB/sn';
    };

    document.getElementById('hc-ram-res-tek').textContent = fmtSayi(tekBant);
    document.getElementById('hc-ram-res-cift').textContent = fmtSayi(ciftBant);
    document.getElementById('hc-ram-res-artis').textContent = '%100 Artış (Bant genişliği ikiye katlandı)';

    var etkiText = '';
    if (senaryo === 'oyun') {
        etkiText = 'Oyunlarda ortalama %15 - %30 FPS artışı sağlar. Dahili grafik birimi (APU) kullanıyorsanız bu artış %70+ seviyesine kadar ulaşabilir ve drop/takılmaları büyük ölçüde engeller.';
    } else if (senaryo === 'kurgu') {
        etkiText = 'Ağır render, video sıkıştırma ve yazılım derleme işlemlerinde %12 - %22 arasında zaman tasarrufu sağlar. Veri transfer darboğazını ortadan kaldırır.';
    } else {
        etkiText = 'Günlük ofis ve web tarayıcı kullanımlarında hissedilir etki düşüktür (%3 - %5). Ancak çoklu görev geçişlerini daha akıcı hale getirir.';
    }

    document.getElementById('hc-ram-res-etki').textContent = etkiText;
    document.getElementById('hc-ram-dual-channel-result').classList.add('visible');
}
