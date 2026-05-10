function hcKitapVeEKitapÇevreselEtkiHesapla() {
    const count = parseFloat(document.getElementById('hc-be-books').value);

    if (!count) return;

    // 1 basılı kitap ~7.5 kg CO2, 8 L su
    // 1 E-okuyucu üretimi ~168 kg CO2 (Tek seferlik)
    const printedCo2 = count * 7.5;
    const ebookCo2 = 168 / 4; // 4 yıl kullanım ömrü varsayımı ile yıllık pay
    
    let resultText = "";
    if (printedCo2 > ebookCo2) {
        resultText = `<span style="color:#27ae60;">E-kitap okumak bu seviyede daha çevreci görünüyor.</span>`;
    } else {
        resultText = `<span style="color:#e67e22;">Basılı kitap okumak bu seviyede daha düşük ayak izine sahip.</span>`;
    }

    document.getElementById('hc-be-stats').innerHTML = `
        <strong>📚 Basılı Kitap (Yıllık):</strong> ${printedCo2.toFixed(1)} kg CO₂e<br>
        <strong>📱 E-Okuyucu (Yıllık Pay):</strong> ${ebookCo2.toFixed(1)} kg CO₂e<br>
        <p style="margin-top:10px;">${resultText}</p>
        <small>*E-okuyucunun 4 yıl kullanıldığı ve şarj tüketiminin ihmal edildiği varsayılmıştır.</small>
    `;
    document.getElementById('hc-be-result').classList.add('visible');
}
