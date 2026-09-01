function hcGebelikHaftasiPad(sayi) {
    return String(sayi).padStart(2, '0');
}

function hcGebelikHaftasiFormat(sayi) {
    return sayi.toLocaleString('tr-TR');
}

function hcGebelikHaftasiTarihFormatla(date) {
    return date.toLocaleDateString('tr-TR', { day: 'numeric', month: 'long', year: 'numeric' });
}

function hcGebelikHaftasiHesapla() {
    const satInput = document.getElementById('hc-gebelik-haftasi-sat').value;
    const bugunInput = document.getElementById('hc-gebelik-haftasi-bugun').value;

    if (!satInput) {
        alert('Lütfen son adet tarihinizin ilk gününü seçiniz.');
        return;
    }

    const satParts = satInput.split('-').map(Number);
    const sat = new Date(satParts[0], satParts[1] - 1, satParts[2]);

    let refTarih = new Date();
    if (bugunInput) {
        const bParts = bugunInput.split('-').map(Number);
        refTarih = new Date(bParts[0], bParts[1] - 1, bParts[2]);
    }

    const diffTime = refTarih.getTime() - sat.getTime();
    const gecenGun = Math.floor(diffTime / (1000 * 60 * 60 * 24));

    if (gecenGun < 0) {
        alert('Hesaplama tarihi son adet tarihinden önce olamaz.');
        return;
    }

    const hafta = Math.floor(gecenGun / 7);
    const gun = gecenGun % 7;

    // Naegele Kuralı: SAT + 280 gün (40 hafta)
    const tahminiDogum = new Date(sat.getTime() + (280 * 24 * 60 * 60 * 1000));
    const kalanGun = Math.floor((tahminiDogum.getTime() - refTarih.getTime()) / (1000 * 60 * 60 * 24));

    const fruitComparisons = {
        4: { fruit: "Haşhaş Tohumu", length: "1 mm", weight: "< 1 g", icon: "🌱" },
        5: { fruit: "Susam Tanesi", length: "2 mm", weight: "< 1 g", icon: "🌱" },
        6: { fruit: "Mercimek Tanesi", length: "4-5 mm", weight: "< 1 g", icon: "🫘" },
        7: { fruit: "Yaban Mersini", length: "1 cm", weight: "1 g", icon: "🫐" },
        8: { fruit: "Ahududu", length: "1.6 cm", weight: "1 g", icon: "🍓" },
        9: { fruit: "Zeytin", length: "2.3 cm", weight: "2 g", icon: "🫒" },
        10: { fruit: "Kuru Erik", length: "3.1 cm", weight: "4 g", icon: "🫐" },
        11: { fruit: "İncir", length: "4.1 cm", weight: "7 g", icon: "🪴" },
        12: { fruit: "Misket Limonu (Lime)", length: "5.4 cm", weight: "14 g", icon: "🍋" },
        13: { fruit: "Limon", length: "7.4 cm", weight: "23 g", icon: "🍋" },
        14: { fruit: "Şeftali", length: "8.7 cm", weight: "43 g", icon: "🍑" },
        15: { fruit: "Elma", length: "10.1 cm", weight: "70 g", icon: "🍎" },
        16: { fruit: "Avokado", length: "11.6 cm", weight: "100 g", icon: "🥑" },
        17: { fruit: "Nar", length: "13 cm", weight: "140 g", icon: "🍎" },
        18: { fruit: "Enginar", length: "14.2 cm", weight: "190 g", icon: "🥦" },
        19: { fruit: "Mango", length: "15.3 cm", weight: "240 g", icon: "🥭" },
        20: { fruit: "Muz", length: "25.6 cm", weight: "300 g", icon: "🍌" },
        21: { fruit: "Havuç", length: "26.7 cm", weight: "360 g", icon: "🥕" },
        22: { fruit: "Hindistan Cevizi", length: "27.8 cm", weight: "430 g", icon: "🥥" },
        23: { fruit: "Büyük Greyfurt", length: "28.9 cm", weight: "500 g", icon: "🍊" },
        24: { fruit: "Mısır Koçanı", length: "30 cm", weight: "600 g", icon: "🌽" },
        25: { fruit: "Karnabahar", length: "34.6 cm", weight: "660 g", icon: "🥦" },
        26: { fruit: "Kıvırcık Marul", length: "35.6 cm", weight: "760 g", icon: "🥬" },
        27: { fruit: "Karnabahar Başı", length: "36.6 cm", weight: "875 g", icon: "🥦" },
        28: { fruit: "Büyük Patlıcan", length: "37.6 cm", weight: "1.000 g (1 kg)", icon: "🍆" },
        29: { fruit: "Balkabağı (Butternut)", length: "38.6 cm", weight: "1.150 g", icon: "🎃" },
        30: { fruit: "Lahana", length: "39.9 cm", weight: "1.320 g", icon: "🥬" },
        31: { fruit: "Ananas", length: "41.1 cm", weight: "1.500 g", icon: "🍍" },
        32: { fruit: "Kavun", length: "42.4 cm", weight: "1.700 g", icon: "🍈" },
        33: { fruit: "Kereviz", length: "43.7 cm", weight: "1.900 g", icon: "🥬" },
        34: { fruit: "Bal Kabağı", length: "45 cm", weight: "2.150 g", icon: "🎃" },
        35: { fruit: "Tatlı Kavun", length: "46.2 cm", weight: "2.380 g", icon: "🍈" },
        36: { fruit: "Pazı Demeti", length: "47.4 cm", weight: "2.600 g", icon: "🥬" },
        37: { fruit: "Kış Kavunu", length: "48.6 cm", weight: "2.860 g", icon: "🍈" },
        38: { fruit: "Pırasa Demeti", length: "49.8 cm", weight: "3.080 g", icon: "🥬" },
        39: { fruit: "Küçük Karpuz", length: "50.7 cm", weight: "3.300 g", icon: "🍉" },
        40: { fruit: "Karpuz", length: "51.2 cm", weight: "3.500 g (3.5 kg)", icon: "🍉" }
    };

    const curWeek = Math.min(Math.max(hafta, 4), 40);
    const fruitData = fruitComparisons[curWeek] || fruitComparisons[20];

    let trimester = '1. Trimester (0 - 13. Hafta)';
    if (hafta >= 14 && hafta <= 27) trimester = '2. Trimester (14 - 27. Hafta)';
    else if (hafta >= 28) trimester = '3. Trimester (28 - 40. Hafta)';

    const progressPct = Math.min(Math.max(Math.round((gecenGun / 280) * 100), 0), 100);

    // Tıbbi Tarama Takvimi
    let screeningsHtml = '';
    if (hafta < 11) {
        screeningsHtml = '<p>🩺 <strong>Erken Dönem:</strong> Kan grubu, tam kan sayımı, TSH, folik asit desteği ve gebelik kesesi/kalp atışı ultrasonu zamanı.</p>';
    } else if (hafta <= 14) {
        screeningsHtml = '<p>🩺 <strong>11-14. Hafta:</strong> 1. Trimester İkili Tarama Testi ve Ense Kalınlığı (NT) ultrasonu dönemi.</p>';
    } else if (hafta <= 22) {
        screeningsHtml = '<p>🩺 <strong>18-22. Hafta:</strong> Detaylı (Ayrıntılı) Düzey 2 Fetal Ultrasonografi ve organ taraması dönemi.</p>';
    } else if (hafta <= 28) {
        screeningsHtml = '<p>🩺 <strong>24-28. Hafta:</strong> Oral Glukoz Tolerans Testi (Şeker Yüklemesi) ve kan uyuşmazlığı iğnesi kontrolü.</p>';
    } else if (hafta <= 36) {
        screeningsHtml = '<p>🩺 <strong>32-36. Hafta:</strong> Fetal büyüme takibi, kan basıncı, idrar tahlili ve doğum pozisyonu değerlendirmesi.</p>';
    } else {
        screeningsHtml = '<p>🩺 <strong>37+ Hafta (Doğum Zamanı):</strong> Haftalık NST (Non-Stres Test), çatı muayenesi ve doğum çantası hazırlığı.</p>';
    }

    document.getElementById('hc-gebelik-haftasi-badge').innerText = `${hafta}. Hafta + ${gun} Günlük`;
    document.getElementById('hc-gebelik-haftasi-ana-sonuc').innerText = `${hafta} Hafta ${gun} Gün`;
    document.getElementById('hc-gebelik-haftasi-ozet').innerText = `Gebeliğinizin yaklaşık ${Math.round(gecenGun / 30.4)} . ayındasınız.`;

    document.getElementById('hc-baby-fruit-box').innerHTML = `
        <div class="hc-fruit-card">
            <div class="hc-fruit-icon">${fruitData.icon}</div>
            <div>
                <div class="hc-fruit-title">Bebeğiniz şu an bir <strong>${fruitData.fruit}</strong> boyutunda!</div>
                <div class="hc-fruit-stats">📏 Yaklaşık Boy: <strong>${fruitData.length}</strong> | ⚖️ Yaklaşık Ağırlık: <strong>${fruitData.weight}</strong></div>
            </div>
        </div>
    `;

    document.getElementById('hc-gebelik-haftasi-dogum').innerText = hcGebelikHaftasiTarihFormatla(tahminiDogum);
    document.getElementById('hc-gebelik-haftasi-kalan').innerText = kalanGun > 0 ? `${kalanGun} gün (${Math.floor(kalanGun / 7)} hafta)` : 'Doğum zamanı geldi!';
    document.getElementById('hc-gebelik-haftasi-gecen').innerText = `${gecenGun} gün`;
    document.getElementById('hc-gebelik-haftasi-donem').innerText = trimester;

    document.getElementById('hc-gebelik-haftasi-yuzde').innerText = `%${progressPct}`;
    document.getElementById('hc-gebelik-haftasi-bar-fill').style.width = `${progressPct}%`;

    document.getElementById('hc-gebelik-screenings').innerHTML = screeningsHtml;

    let yorum = `Bebeğiniz hızla büyümeye devam ediyor. ${trimester} evresinde sağlıklı ve dengeli beslenmeye, hekiminizin önerdiği vitaminleri düzenli kullanmaya özen gösteriniz.`;
    document.getElementById('hc-gebelik-haftasi-yorum').innerText = yorum;

    document.getElementById('hc-gebelik-haftasi-result').classList.add('visible');
    document.getElementById('hc-gebelik-haftasi-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}

document.addEventListener('DOMContentLoaded', function() {
    const bugunEl = document.getElementById('hc-gebelik-haftasi-bugun');
    if (bugunEl && !bugunEl.value) {
        const now = new Date();
        bugunEl.value = `${now.getFullYear()}-${hcGebelikHaftasiPad(now.getMonth() + 1)}-${hcGebelikHaftasiPad(now.getDate())}`;
    }
});
