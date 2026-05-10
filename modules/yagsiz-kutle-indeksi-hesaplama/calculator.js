function hcFfmiHesapla() {
    const weight = parseFloat(document.getElementById('hc-ffmi-weight').value);
    const height = parseFloat(document.getElementById('hc-ffmi-height').value) / 100;
    const fat = parseFloat(document.getElementById('hc-ffmi-fat').value) / 100;

    if (!weight || !height || isNaN(fat)) return;

    const lbm = weight * (1 - fat);
    let ffmi = lbm / (height * height);
    
    // Adjusted FFMI for standard 1.8m height
    const adjFfmi = ffmi + 6.0 * (height - 1.8);

    const resVal = document.getElementById('hc-ffmi-res-val');
    const resDesc = document.getElementById('hc-ffmi-res-desc');

    resVal.innerText = adjFfmi.toFixed(1).toLocaleString('tr-TR');

    if (adjFfmi < 18) resDesc.innerText = 'Ortalama Altı';
    else if (adjFfmi < 20) resDesc.innerText = 'Ortalama';
    else if (adjFfmi < 22) resDesc.innerText = 'İyi (Kaslı)';
    else if (adjFfmi < 25) resDesc.innerText = 'Çok İyi (Üst Düzey)';
    else resDesc.innerText = 'Genetik Sınır / İleri Seviye';

    document.getElementById('hc-ffmi-result').classList.add('visible');
}
