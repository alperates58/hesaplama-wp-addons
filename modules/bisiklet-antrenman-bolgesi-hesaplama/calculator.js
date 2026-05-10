function hcBisikletAntrenmanBolgesiHesapla() {
    const ftp = parseFloat(document.getElementById('hc-ftp').value);

    if (!ftp) {
        alert('Lütfen FTP değerinizi girin.');
        return;
    }

    const zones = [
        { z: "Z1", name: "Aktif Toparlanma", min: 0, max: 55 },
        { z: "Z2", name: "Dayanıklılık (Endurance)", min: 56, max: 75 },
        { z: "Z3", name: "Tempo", min: 76, max: 90 },
        { z: "Z4", name: "Laktat Eşiği", min: 91, max: 105 },
        { z: "Z5", name: "VO2 Max", min: 106, max: 120 },
        { z: "Z6", name: "Anaerobik Kapasite", min: 121, max: 150 },
        { z: "Z7", name: "Nöromüsküler Güç", min: 151, max: 0 }
    ];

    let html = "";
    zones.forEach(z => {
        const minW = Math.round(ftp * (z.min / 100));
        const maxW = z.max === 0 ? "+" : Math.round(ftp * (z.max / 100));
        html += `
            <tr class="zone-${z.z}">
                <td><strong>${z.z}</strong></td>
                <td>${z.name}</td>
                <td>${minW} - ${maxW} W</td>
            </tr>
        `;
    });

    document.getElementById('hc-zones-table').innerHTML = html;
    document.getElementById('hc-zones-result').classList.add('visible');
}
