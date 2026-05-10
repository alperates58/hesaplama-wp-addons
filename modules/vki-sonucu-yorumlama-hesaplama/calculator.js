function hcVkiInterpretHesapla() {
    const vki = parseFloat(document.getElementById('hc-vi-val').value);
    if (!vki) return;

    const resTitle = document.getElementById('hc-vi-res-title');
    const resDesc = document.getElementById('hc-vi-res-desc');

    if (vki < 18.5) {
        resTitle.innerText = 'Zayıf';
        resTitle.style.color = '#3498db';
        resDesc.innerText = 'Vücut direnciniz düşük olabilir. Bağışıklık sistemi ve vitamin eksiklikleri açısından bir beslenme uzmanına danışmanız önerilir.';
    } else if (vki < 25) {
        resTitle.innerText = 'Normal (Sağlıklı)';
        resTitle.style.color = '#27ae60';
        resDesc.innerText = 'İdeal kilodasınız. Mevcut beslenme ve egzersiz düzeninizi korumanız sağlığınız için en iyisidir.';
    } else if (vki < 30) {
        resTitle.innerText = 'Fazla Kilolu';
        resTitle.style.color = '#f1c40f';
        resDesc.innerText = 'Tip 2 diyabet ve tansiyon riskleri artmaya başlayabilir. Hafif bir diyet ve düzenli yürüyüş önerilir.';
    } else {
        resTitle.innerText = 'Obezite';
        resTitle.style.color = '#e74c3c';
        resDesc.innerText = 'Ciddi sağlık riskleri (kalp damar hastalıkları, eklem sorunları vb.) mevcuttur. Tıbbi destek ve profesyonel diyet planı gereklidir.';
    }

    document.getElementById('hc-vki-interpret-result').classList.add('visible');
}
