function hcGelirVergisi2026Hesapla() {
    const matrah = parseFloat(document.getElementById('hc-gv-matrah').value) || 0;
    const type = document.getElementById('hc-gv-type').value;

    if (matrah <= 0) {
        alert('Lütfen geçerli bir yıllık vergi matrahı giriniz.');
        return;
    }

    // 2026 Gelir Vergisi Dilimleri (GVK Madde 103)
    // Ücret Gelirleri: 190.000 TL (%15), 400.000 TL (%20), 1.500.000 TL (%27), 5.300.000 TL (%35), üzeri (%40)
    // Ücret Dışı Gelirler: 190.000 TL (%15), 400.000 TL (%20), 1.000.000 TL (%27), 5.300.000 TL (%35), üzeri (%40)
    const limit3 = (type === 'wage' ? 1500000 : 1000000);
    const brackets = [190000, 400000, limit3, 5300000];
    const rates = [0.15, 0.20, 0.27, 0.35, 0.40];

    const bracketTaxes = [0, 0, 0, 0, 0];
    const bracketAmounts = [0, 0, 0, 0, 0];

    let rem = matrah;

    // 1. Dilim (0 - 190.000 TL)
    if (rem > 0) {
        const b1Amount = Math.min(rem, brackets[0]);
        bracketAmounts[0] = b1Amount;
        bracketTaxes[0] = b1Amount * rates[0];
        rem -= b1Amount;
    }

    // 2. Dilim (190.000 - 400.000 TL)
    if (rem > 0) {
        const b2Span = brackets[1] - brackets[0];
        const b2Amount = Math.min(rem, b2Span);
        bracketAmounts[1] = b2Amount;
        bracketTaxes[1] = b2Amount * rates[1];
        rem -= b2Amount;
    }

    // 3. Dilim (400.000 - 1.500.000 / 1.000.000 TL)
    if (rem > 0) {
        const b3Span = brackets[2] - brackets[1];
        const b3Amount = Math.min(rem, b3Span);
        bracketAmounts[2] = b3Amount;
        bracketTaxes[2] = b3Amount * rates[2];
        rem -= b3Amount;
    }

    // 4. Dilim (1.500.000 - 5.300.000 TL)
    if (rem > 0) {
        const b4Span = brackets[3] - brackets[2];
        const b4Amount = Math.min(rem, b4Span);
        bracketAmounts[3] = b4Amount;
        bracketTaxes[3] = b4Amount * rates[3];
        rem -= b4Amount;
    }

    // 5. Dilim (5.300.000 TL üzeri)
    if (rem > 0) {
        bracketAmounts[4] = rem;
        bracketTaxes[4] = rem * rates[4];
    }

    const totalTax = bracketTaxes.reduce((a, b) => a + b, 0);
    const effectiveRate = (totalTax / matrah) * 100;
    const netKalan = matrah - totalTax;

    const heroHtml = `
        <div class="hc-num-hero-card">
            <div class="hc-num-badge">🏛️ Toplam Gelir Vergisi (2026)</div>
            <div class="hc-num-title">${Math.round(totalTax).toLocaleString('tr-TR')} ₺</div>
            <p class="hc-num-sub">Efektif Vergi Oranı: <strong>%${effectiveRate.toFixed(2)}</strong> | Vergiden Sonra Kalan Net: <strong>${Math.round(netKalan).toLocaleString('tr-TR')} ₺</strong></p>
        </div>
    `;

    const tableHtml = `
        <table class="hc-gv-table">
            <thead>
                <tr>
                    <th>Vergi Dilimi</th>
                    <th>Oran</th>
                    <th>Bu Dilime Giren Tutar</th>
                    <th>Hesaplanan Vergi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1. Dilim (0 - 190.000 ₺)</td>
                    <td>%15</td>
                    <td>${Math.round(bracketAmounts[0]).toLocaleString('tr-TR')} ₺</td>
                    <td><strong>${Math.round(bracketTaxes[0]).toLocaleString('tr-TR')} ₺</strong></td>
                </tr>
                <tr>
                    <td>2. Dilim (190.000 - 400.000 ₺)</td>
                    <td>%20</td>
                    <td>${Math.round(bracketAmounts[1]).toLocaleString('tr-TR')} ₺</td>
                    <td><strong>${Math.round(bracketTaxes[1]).toLocaleString('tr-TR')} ₺</strong></td>
                </tr>
                <tr>
                    <td>3. Dilim (400.000 - ${brackets[2].toLocaleString('tr-TR')} ₺)</td>
                    <td>%27</td>
                    <td>${Math.round(bracketAmounts[2]).toLocaleString('tr-TR')} ₺</td>
                    <td><strong>${Math.round(bracketTaxes[2]).toLocaleString('tr-TR')} ₺</strong></td>
                </tr>
                <tr>
                    <td>4. Dilim (${brackets[2].toLocaleString('tr-TR')} - 5.300.000 ₺)</td>
                    <td>%35</td>
                    <td>${Math.round(bracketAmounts[3]).toLocaleString('tr-TR')} ₺</td>
                    <td><strong>${Math.round(bracketTaxes[3]).toLocaleString('tr-TR')} ₺</strong></td>
                </tr>
                <tr>
                    <td>5. Dilim (5.300.000 ₺ ve Üzeri)</td>
                    <td>%40</td>
                    <td>${Math.round(bracketAmounts[4]).toLocaleString('tr-TR')} ₺</td>
                    <td><strong>${Math.round(bracketTaxes[4]).toLocaleString('tr-TR')} ₺</strong></td>
                </tr>
                <tr style="background:#ecfdf5; font-size:15px; font-weight:800; color:#15803d;">
                    <td colspan="3">GENEL TOPLAM HESAPLANAN VERGİ</td>
                    <td>${Math.round(totalTax).toLocaleString('tr-TR')} ₺</td>
                </tr>
            </tbody>
        </table>
    `;

    const descHtml = `
        <p><strong>2026 Gelir Vergisi Tarifesi Değerlendirmesi:</strong> 193 Sayılı Gelir Vergisi Kanunu'nun 103. maddesi uyarınca 2026 yılı için belirlenen dilimler üzerinden hesaplama yapılmıştır. ${type === 'wage' ? 'Ücret gelirlerinde 3. dilim tavanı 1.500.000 TL olarak uygulanmaktadır.' : 'Ücret dışı gelirlerde 3. dilim tavanı 1.000.000 TL olarak uygulanmaktadır.'}</p>
        <p>Efektif vergi oranınız <strong>%${effectiveRate.toFixed(2)}</strong> seviyesindedir. Maaşlı çalışanlarda her ay asgari ücret tutarı kadar vergi istisnası uygulanarak net ödeme tutarı yükseltilir.</p>
    `;

    document.getElementById('hc-gv-hero').innerHTML = heroHtml;
    document.getElementById('hc-gv-table-box').innerHTML = tableHtml;
    document.getElementById('hc-gv-desc').innerHTML = descHtml;

    document.getElementById('hc-gv-result').classList.add('visible');
    document.getElementById('hc-gv-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}
