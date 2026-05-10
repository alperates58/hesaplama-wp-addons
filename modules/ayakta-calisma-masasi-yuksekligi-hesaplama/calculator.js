function hcAyaktaÇalışmaMasasıYüksekliğiHesapla() {
    const h = parseFloat(document.getElementById('hc-sd-height').value);

    if (!h) return;

    // Ergonomik kural: Dirsek yüksekliği masanın üst seviyesi olmalı.
    // Yaklaşık dirsek yüksekliği = Boy * 0.63
    const deskH = Math.round(h * 0.63);
    const monitorH = Math.round(h * 0.92); // Göz hizası

    document.getElementById('hc-sd-val').innerText = deskH + ' cm';
    document.getElementById('hc-sd-info').innerHTML = `
        Göz Hizası (Monitör Üstü): ${monitorH} cm<br>
        *Omuzlarınız rahat, dirsekleriniz 90 derece bükülü olmalıdır.
    `;
    document.getElementById('hc-sd-result').classList.add('visible');
}
