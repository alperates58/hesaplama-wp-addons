function hcCeketBedeniHesapla() {
    const gogus = parseFloat(document.getElementById('hc-gogus').value);
    const bel = parseFloat(document.getElementById('hc-bel').value);
    const boy = parseFloat(document.getElementById('hc-boy').value);

    if (isNaN(gogus) || isNaN(bel) || isNaN(boy)) {
        alert('Lütfen tüm ölçüleri eksiksiz giriniz.');
        return;
    }

    // Beden: Göğüs çevresinin yarısı (en yakın çift sayıya yuvarlanır genellikle, ama direkt yarısı baz alınır)
    let beden = Math.round(gogus / 2);
    if (beden % 2 !== 0) beden += 1; // Çift sayı bedenler yaygındır

    // Drop Hesabı: (Ceket Bedeni) - (Pantolon Bedeni/Bel Orantısı)
    // Pratikte: (Göğüs / 2) - (Bel / 2) farkına bakılır
    const fark = (gogus / 2) - (bel / 2);
    
    let drop = 6; // Standart
    let tip = "Normal (Standart) Kesim";
    let desc = "Vücut ölçüleriniz standart orantıdadır (Drop 6). Çoğu hazır giyim ceketi size tam olacaktır.";

    if (fark >= 7.5) {
        drop = 8;
        tip = "Slim Fit / Atletik Kesim";
        desc = "Göğüs kafesiniz belinize göre daha geniş. İtalyan kesim veya Slim Fit (Drop 8) modelleri tercih etmelisiniz.";
    } else if (fark <= 4.5 && fark > 2) {
        drop = 4;
        tip = "Geniş / Rahat Kesim";
        desc = "Bel bölgeniz göğüs ölçünüze yakın. Rahat kesim (Drop 4) modeller size daha konforlu bir kullanım sunar.";
    } else if (fark <= 2) {
        drop = 0; // Çok nadir ama büyük beden/özel durum
        tip = "Ekstra Geniş Kesim";
        desc = "Geniş kalıplı veya özel dikim ceketleri tercih etmeniz önerilir.";
    }

    // Boy Kategorisi
    let boyKat = "Normal";
    if (boy < 172) {
        boyKat = "Kısa (S)";
    } else if (boy > 186) {
        boyKat = "Uzun (L)";
    }

    // Sonuçları Yazdır
    document.getElementById('hc-res-size').innerText = beden + " Beden";
    document.getElementById('hc-res-drop').innerText = "Drop " + drop;
    document.getElementById('hc-res-type').innerText = tip;
    document.getElementById('hc-res-length').innerText = boyKat;
    document.getElementById('hc-res-desc').innerText = desc;

    // Görünür yap
    const resultDiv = document.getElementById('hc-ceket-result');
    resultDiv.classList.add('visible');
    resultDiv.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
}
