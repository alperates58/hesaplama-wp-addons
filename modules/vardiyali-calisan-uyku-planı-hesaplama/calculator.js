function hcShiftSleepHesapla() {
    const type = document.getElementById('hc-vcs-type').value;
    const resContent = document.getElementById('hc-vcs-res-content');
    
    let html = '';
    if (type === 'night') {
        html = `
            <div class="hc-vcs-plan">
                <strong>Önerilen Plan: "Sabit Gündüz Uykusu"</strong>
                <ul>
                    <li><strong>Yatış:</strong> 07:30 - 08:00 (İş dönüşü hemen)</li>
                    <li><strong>Uyanış:</strong> 15:30 - 16:00</li>
                    <li><strong>Not:</strong> Odayı tamamen karartın ve gürültü izolasyonu sağlayın.</li>
                </ul>
            </div>
        `;
    } else if (type === 'evening') {
        html = `
            <div class="hc-vcs-plan">
                <strong>Önerilen Plan: "Gece Yarısı Uykusu"</strong>
                <ul>
                    <li><strong>Yatış:</strong> 01:30 - 02:00</li>
                    <li><strong>Uyanış:</strong> 09:30 - 10:00</li>
                    <li><strong>Not:</strong> Vardiya sonrası "gevşeme" süresi bırakmayı unutmayın.</li>
                </ul>
            </div>
        `;
    } else {
        html = `
            <div class="hc-vcs-plan">
                <strong>Önerilen Plan: "Çapa (Anchor) Uyku"</strong>
                <ul>
                    <li>Vardiyalar değiştikçe uykunun en az 4 saatini hep aynı dilimde tutmaya çalışın (Örn: 03:00 - 07:00 arası sabit kalsın).</li>
                    <li>Vardiya öncesi 20-30 dakikalık kısa şekerlemeler yapın.</li>
                </ul>
            </div>
        `;
    }

    resContent.innerHTML = html;
    document.getElementById('hc-shift-sleep-result').classList.add('visible');
}
