function hcAyTutulmasiHesapla() {
    const eclipses = [
        {
            date: "3 Mart 2026",
            type: "Tam Ay Tutulması",
            visibility: "Amerika, Pasifik, Doğu Asya ve Avustralya'dan görülebilir.",
            info: "Ay'ın tamamı Dünya'nın tam gölge konisine girerek 'Kanlı Ay' olarak bilinen kızıl bir renge bürünecektir."
        },
        {
            date: "28 Ağustos 2026",
            type: "Parçalı Ay Tutulması",
            visibility: "Avrupa, Afrika, Amerika ve Asya'nın bir kısmından görülebilir.",
            info: "Ay'ın bir kısmı Dünya'nın tam gölgesinden geçerek kararmış bir görünüm alacaktır. Türkiye'den gözlemlenebilir."
        }
    ];

    let html = '<table style="width:100%; border-collapse:collapse;">';
    html += '<thead><tr><th>Tarih</th><th>Tür</th><th>Görünürlük</th></tr></thead><tbody>';
    
    eclipses.forEach(e => {
        html += `<tr>
            <td><strong>${e.date}</strong></td>
            <td>${e.type}</td>
            <td>${e.visibility}</td>
        </tr>
        <tr>
            <td colspan="3" style="font-size:12px; color:#666; border-bottom:2px solid #eee;">${e.info}</td>
        </tr>`;
    });
    
    html += '</tbody></table>';

    document.getElementById('hc-at-content').innerHTML = html;
    document.getElementById('hc-at-result').classList.add('visible');
}
