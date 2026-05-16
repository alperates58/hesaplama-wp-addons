function hcCakraAnalizEt() {
    const scores = [
        { name: "Kök Çakra", val: parseInt(document.getElementById('hc-c1').value) },
        { name: "Sakral Çakra", val: parseInt(document.getElementById('hc-c2').value) },
        { name: "Solar Pleksus", val: parseInt(document.getElementById('hc-c3').value) },
        { name: "Kalp Çakrası", val: parseInt(document.getElementById('hc-c4').value) },
        { name: "Boğaz Çakrası", val: parseInt(document.getElementById('hc-c5').value) },
        { name: "Üçüncü Göz", val: parseInt(document.getElementById('hc-c6').value) },
        { name: "Tepe Çakrası", val: parseInt(document.getElementById('hc-c7').value) }
    ];

    const total = scores.reduce((acc, curr) => acc + curr.val, 0);
    const avg = (total / 70) * 100;

    let report = `<p>Enerji seviyeniz 100 üzerinden <strong>%${Math.round(avg)}</strong> olarak hesaplandı.</p>`;

    // Find min and max
    let minC = scores[0];
    let maxC = scores[0];
    scores.forEach(s => {
        if (s.val < minC.val) minC = s;
        if (s.val > maxC.val) maxC = s;
    });

    report += `<p style="color: #2e7d32;"><strong>En Güçlü Alanınız:</strong> ${maxC.name}. Bu alan yaşamınızda denge ve güç kaynağınız.</p>`;
    report += `<p style="color: #d32f2f;"><strong>Denge Gereken Alan:</strong> ${minC.name}. Bu çakranızdaki blokajlar sizi yorgun veya dengesiz hissettirebilir.</p>`;
    
    report += `<hr><h4>Öneriler:</h4><ul>`;
    if (minC.name === "Kök Çakra") report += `<li>Doğada vakit geçirin, çıplak ayakla toprağa basın.</li>`;
    if (minC.name === "Sakral Çakra") report += `<li>Yaratıcı hobiler edinin, suyla temas edin (yüzme, banyo).</li>`;
    if (minC.name === "Solar Pleksus") report += `<li>Güneş ışığı alın, hedefleriniz için küçük adımlar atın.</li>`;
    if (minC.name === "Kalp Çakrası") report += `<li>Kendinize ve başkalarına karşı şefkatli olun, affetme çalışmaları yapın.</li>`;
    if (minC.name === "Boğaz Çakrası") report += `<li>Duygularınızı günlük tutarak veya şarkı söyleyerek ifade edin.</li>`;
    if (minC.name === "Üçüncü Göz") report += `<li>Meditasyon yapın, rüyalarınızı not alın.</li>`;
    if (minC.name === "Tepe Çakrası") report += `<li>Sessizlikte kalın, spiritüel okumalar yapın.</li>`;
    report += `</ul>`;

    document.getElementById('hc-chakra-total').innerText = `%${Math.round(avg)}`;
    document.getElementById('hc-chakra-report').innerHTML = report;
    document.getElementById('hc-cakra-denge-puani-result').classList.add('visible');
}
