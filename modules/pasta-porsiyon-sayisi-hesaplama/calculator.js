function hcCakeSizeNeededHesapla() {
    const count = parseInt(document.getElementById('hc-cs-count').value);

    if (isNaN(count) || count <= 0) {
        alert('Lütfen kişi sayısını giriniz.');
        return;
    }

    let recommendation = '';
    if (count <= 6) recommendation = '16-18 cm Yuvarlak Kalıp';
    else if (count <= 12) recommendation = '20-22 cm Yuvarlak Kalıp';
    else if (count <= 20) recommendation = '24-26 cm Yuvarlak Kalıp';
    else if (count <= 35) recommendation = '30 cm Yuvarlak veya 28 cm Kare Kalıp';
    else recommendation = 'Katlı pasta veya birden fazla kalıp önerilir.';

    document.getElementById('hc-cs-val').innerText = recommendation;
    document.getElementById('hc-cs-info').innerText = `${count} kişi için standart dilim ölçüleri baz alınmıştır. Kalıp yüksekliğinin en az 7-8 cm olması önerilir.`;
    
    document.getElementById('hc-cake-size-result').classList.add('visible');
}
