function hcYumurtlamaGunuFormat(date) {
    return date.toLocaleDateString('tr-TR', { day: 'numeric', month: 'long', year: 'numeric' });
}

function hcYumurtlamaGunuHesapla() {
    const satInput = document.getElementById('hc-ygh-son-adet').value;
    const donguInput = parseInt(document.getElementById('hc-ygh-dongu').value, 10);

    if (!satInput || isNaN(donguInput) || donguInput < 20 || donguInput > 50) {
        alert('Lütfen geçerli bir son adet tarihi ve 20-50 gün arası döngü uzunluğu giriniz.');
        return;
    }

    const satParts = satInput.split('-').map(Number);
    const sat = new Date(satParts[0], satParts[1] - 1, satParts[2]);

    // Luteal faz kuralı: Yumurtlama, bir sonraki adetten 14 gün önce gerçekleşir.
    const ovulasyonGunuOffset = donguInput - 14;
    const ovulasyonTarihi = new Date(sat.getTime() + (ovulasyonGunuOffset * 24 * 60 * 60 * 1000));

    // Doğurganlık Penceresi: Yumurtlamadan 5 gün önce başlar, yumurtlama günü biter (toplam 6 gün)
    const pencereBaslangic = new Date(ovulasyonTarihi.getTime() - (5 * 24 * 60 * 60 * 1000));
    const pencereBitis = new Date(ovulasyonTarihi.getTime() + (1 * 24 * 60 * 60 * 1000));

    // İmplantasyon (Yerleşme): Yumurtlamadan 7-10 gün sonra
    const implantasyonTarihi = new Date(ovulasyonTarihi.getTime() + (9 * 24 * 60 * 60 * 1000));

    // Sonraki Beklenen Adet
    const sonrakiAdet = new Date(sat.getTime() + (donguInput * 24 * 60 * 60 * 1000));

    // Erken Gebelik Testi: Beklenen adetten 2 gün önce veya yumurtlamadan 12 gün sonra
    const testTarihi = new Date(ovulasyonTarihi.getTime() + (12 * 24 * 60 * 60 * 1000));

    document.getElementById('hc-ygh-ana-sonuc').innerText = hcYumurtlamaGunuFormat(ovulasyonTarihi);
    document.getElementById('hc-ygh-ozet').innerText = `Döngünüzün ${ovulasyonGunuOffset}. gününe denk gelmektedir.`;

    document.getElementById('hc-fertility-window-box').innerHTML = `
        <div class="hc-fert-card">
            <div class="hc-fert-badge">🌸 Gebe Kalma İhtimalinin En Yüksek Olduğu 6 Gün</div>
            <div class="hc-fert-dates">${hcYumurtlamaGunuFormat(pencereBaslangic)} — ${hcYumurtlamaGunuFormat(pencereBitis)}</div>
            <p class="hc-fert-sub">Sperm hücreleri kadın vücudunda 3-5 güne kadar canlı kalabildiği için bu aralıkta girilen ilişkiler gebelik şansını maksimuma çıkarır.</p>
        </div>
    `;

    document.getElementById('hc-ygh-dogurgan').innerText = `${hcYumurtlamaGunuFormat(pencereBaslangic)} - ${hcYumurtlamaGunuFormat(pencereBitis)}`;
    document.getElementById('hc-ygh-implantasyon').innerText = hcYumurtlamaGunuFormat(implantasyonTarihi);
    document.getElementById('hc-ygh-test-tarihi').innerText = hcYumurtlamaGunuFormat(testTarihi);
    document.getElementById('hc-ygh-sonraki-adet').innerText = hcYumurtlamaGunuFormat(sonrakiAdet);

    let yorum = `Ortalama ${donguInput} günlük döngünüze göre en verimli gününüz <strong>${hcYumurtlamaGunuFormat(ovulasyonTarihi)}</strong> olarak hesaplanmıştır. Gebelik planlıyorsanız doğurganlık pencereniz boyunca 2 günde bir düzenli birliktelik önerilir.`;
    document.getElementById('hc-ygh-yorum').innerHTML = yorum;

    document.getElementById('hc-ygh-result').classList.add('visible');
    document.getElementById('hc-ygh-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}
