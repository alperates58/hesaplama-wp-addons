function hcEvlerHesapla() {
    const dStr = document.getElementById('hc-ev-date').value;
    const tStr = document.getElementById('hc-ev-time').value;
    const loc = document.getElementById('hc-ev-city').value.split(',').map(Number);

    if (!dStr || !tStr) { alert('Lütfen tarih ve saat girin.'); return; }

    const date = new Date(dStr + 'T' + tStr);
    const jd = (date.getTime() / 86400000) + 2440587.5;
    const d = jd - 2451543.5;
    const rad = Math.PI / 180;

    function norm(x) { x %= 360; return x < 0 ? x + 360 : x; }

    const gmst = norm(280.46061837 + 360.98564736629 * d);
    const lst = norm(gmst + loc[1]);
    const obl = 23.439 - 0.0000004 * d;
    const asc = norm(Math.atan2(Math.cos(lst * rad), -Math.sin(lst * rad) * Math.cos(obl * rad) - Math.tan(loc[0] * rad) * Math.sin(obl * rad)) / rad + 90);

    const burclar = ["Koç", "Boğa", "İkizler", "Yengeç", "Aslan", "Başak", "Terazi", "Akrep", "Yay", "Oğlak", "Kova", "Balık"];
    const ascIdx = Math.floor(asc / 30);

    const evAnlamlari = [
        "1. Ev (Yükselen): Kişilik, fiziksel görünüm ve hayata bakış açınız.",
        "2. Ev: Maddi kaynaklar, kazançlar, öz değer ve yetenekleriniz.",
        "3. Ev: İletişim, yakın çevre, kardeşler ve kısa yolculuklar.",
        "4. Ev: Yuva, aile, kökler ve içsel huzur.",
        "5. Ev: Yaratıcılık, aşk, çocuklar ve hobiler.",
        "6. Ev: Günlük rutinler, iş hayatı, sağlık ve hizmet.",
        "7. Ev: İkili ilişkiler, evlilik ve ortaklıklar.",
        "8. Ev: Dönüşüm, krizler, ortak kaynaklar ve maneviyat.",
        "9. Ev: Yüksek öğrenim, felsefe, inançlar ve uzak seyahatler.",
        "10. Ev (MC): Kariyer, toplumsal statü ve başarılar.",
        "11. Ev: Sosyal çevre, arkadaşlar ve idealler.",
        "12. Ev: Bilinçaltı, gizli düşmanlar, izolasyon ve ruhsal gelişim."
    ];

    let html = "<ul>";
    for(let i=0; i<12; i++) {
        const idx = (ascIdx + i) % 12;
        html += `<li><strong>${evAnlamlari[i].split(':')[0]}:</strong> ${burclar[idx]} burcu - ${evAnlamlari[i].split(':')[1]}</li>`;
    }
    html += "</ul>";

    document.getElementById('hc-ev-list').innerHTML = html;
    document.getElementById('hc-ev-result').classList.add('visible');
}
