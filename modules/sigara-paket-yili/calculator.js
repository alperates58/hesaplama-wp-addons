function hcSigaraPaketYiliHesapla() {
    const adet = parseFloat(document.getElementById('hc-spy-adet').value);
    const yil = parseFloat(document.getElementById('hc-spy-yil').value);

    if (isNaN(adet) || isNaN(yil)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    const paketSayisi = adet / 20;
    const paketYili = paketSayisi * yil;

    const resultVal = document.getElementById('hc-spy-res-deger');
    const resultYorum = document.getElementById('hc-spy-res-yorum');

    resultVal.innerText = paketYili.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' Paket Yılı';

    let yorum = '';
    let renk = 'var(--hc-front-text)';

    if (paketYili === 0) {
        yorum = 'Maruziyet bulunamadı.';
    } else if (paketYili < 10) {
        yorum = 'Düşük maruziyet düzeyi.';
        renk = 'var(--hc-front-green)';
    } else if (paketYili < 20) {
        yorum = 'Orta maruziyet düzeyi. Sağlık kontrollerinizi aksatmayın.';
        renk = 'var(--hc-front-gold)';
    } else {
        yorum = 'Yüksek maruziyet düzeyi! KOAH ve Akciğer kanseri riski belirgin şekilde artmıştır.';
        renk = 'var(--hc-front-red)';
    }

    resultYorum.innerText = yorum;
    resultYorum.style.color = renk;

    document.getElementById('hc-sigara-paket-yili-result').classList.add('visible');
}
