function hcGunesTutulmasiHesapla() {
    const eclipses = [
        {
            date: "17 Şubat 2026",
            type: "Halkalı Güneş Tutulması",
            visibility: "Antarktika ve Güney Afrika'dan gözlemlenebilir.",
            info: "Bu tutulma sırasında Ay, Güneş'in merkezini kaplar ancak kenarları açıkta bırakarak bir 'ateş çemberi' oluşturur."
        },
        {
            date: "12 Ağustos 2026",
            type: "Tam Güneş Tutulması",
            visibility: "Arktik, Grönland, İzlanda, İspanya ve Rusya'dan gözlemlenebilir.",
            info: "Avrupa'nın büyük bir kısmında parçalı tutulma olarak görülecektir. İspanya'da ise tam tutulma olarak izlenebilecektir."
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

    document.getElementById('hc-gt-content').innerHTML = html;
    document.getElementById('hc-gt-result').classList.add('visible');
}
