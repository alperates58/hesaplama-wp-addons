function hcSigaraMaliyetiHesapla() {
    const adetInput = document.getElementById('hc-smt-adet');
    const fiyatInput = document.getElementById('hc-smt-fiyat');
    const dalInput = document.getElementById('hc-smt-dal');
    const yilInput = document.getElementById('hc-smt-yil');

    const adet = parseFloat(adetInput.value);
    const fiyat = parseFloat(fiyatInput.value);
    const dal = parseFloat(dalInput.value);
    const yil = parseFloat(yilInput.value);

    if (isNaN(adet) || isNaN(fiyat) || isNaN(dal) || isNaN(yil)) {
        alert('Lütfen tüm alanları geçerli sayılarla doldurun.');
        return;
    }

    const gunlukMaliyet = (adet / dal) * fiyat;
    const aylikMaliyet = gunlukMaliyet * 30.44;
    const yillikMaliyet = gunlukMaliyet * 365.25;
    const toplamMaliyet = yillikMaliyet * yil;
    
    const toplamAdet = adet * 365.25 * yil;
    const kayipDakika = toplamAdet * 11;
    const kayipGun = Math.floor(kayipDakika / (60 * 24));
    
    document.getElementById('hc-smt-res-toplam').innerText = toplamMaliyet.toLocaleString('tr-TR', { maximumFractionDigits: 0 }) + ' ₺';
    document.getElementById('hc-smt-res-aylik').innerText = aylikMaliyet.toLocaleString('tr-TR', { maximumFractionDigits: 0 }) + ' ₺';
    document.getElementById('hc-smt-res-yillik').innerText = yillikMaliyet.toLocaleString('tr-TR', { maximumFractionDigits: 0 }) + ' ₺';
    document.getElementById('hc-smt-res-adet').innerText = Math.round(toplamAdet).toLocaleString('tr-TR') + ' Adet';
    document.getElementById('hc-smt-res-sure').innerText = kayipGun.toLocaleString('tr-TR') + ' Gün';

    document.getElementById('hc-sigara-maliyeti-tuketimi-result').classList.add('visible');
    
    // Scroll to result on mobile
    if (window.innerWidth < 480) {
        document.getElementById('hc-sigara-maliyeti-tuketimi-result').scrollIntoView({ behavior: 'smooth' });
    }
}
