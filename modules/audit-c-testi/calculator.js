function hcAuditCHesapla() {
    const q1 = parseInt(document.getElementById('hc-auditc-q1').value);
    const q2 = parseInt(document.getElementById('hc-auditc-q2').value);
    const q3 = parseInt(document.getElementById('hc-auditc-q3').value);
    const cinsiyet = document.getElementById('hc-auditc-cinsiyet').value;

    const toplamPuan = q1 + q2 + q3;

    document.getElementById('hc-auditc-res-puan').innerText = toplamPuan;
    
    const yorumBox = document.getElementById('hc-auditc-res-yorum');
    const esik = (cinsiyet === 'erkek') ? 4 : 3;

    if (toplamPuan >= esik) {
        yorumBox.innerHTML = '<strong>RİSKLİ KULLANIM TESPİT EDİLDİ.</strong><br>Puanınız pozitif (riskli) eşiğin üzerindedir. Bu durum, alkol kullanımınızın sağlığınız için risk oluşturabileceğini gösterir. Bir sağlık profesyoneli ile görüşmeniz önerilir.';
        yorumBox.style.background = 'rgba(192, 54, 44, 0.1)';
        yorumBox.style.color = 'var(--hc-front-red)';
    } else {
        yorumBox.innerHTML = '<strong>DÜŞÜK RİSK.</strong><br>Puanınız mevcut verilere göre düşük riskli alkol kullanımını işaret etmektedir. Ancak alkolün her miktarının bağımlılık ve sağlık riski taşıyabileceğini unutmayın.';
        yorumBox.style.background = 'rgba(15, 138, 95, 0.1)';
        yorumBox.style.color = 'var(--hc-front-green)';
    }

    document.getElementById('hc-audit-c-testi-result').classList.add('visible');
}
