function hcCageHesapla() {
    const q1 = parseInt(document.getElementById('hc-cage-q1').value);
    const q2 = parseInt(document.getElementById('hc-cage-q2').value);
    const q3 = parseInt(document.getElementById('hc-cage-q3').value);
    const q4 = parseInt(document.getElementById('hc-cage-q4').value);

    const toplamPuan = q1 + q2 + q3 + q4;

    document.getElementById('hc-cage-res-puan').innerText = toplamPuan;
    
    const yorumBox = document.getElementById('hc-cage-res-yorum');

    if (toplamPuan >= 2) {
        yorumBox.innerHTML = '<strong>KLİNİK ÖNEMLİ BULGU.</strong><br>2 veya daha fazla "Evet" cevabı, alkol kullanımı ile ilgili ciddi bir risk veya bağımlılık olasılığına işaret eder. Bir sağlık uzmanı ile görüşmeniz önerilir.';
        yorumBox.style.background = 'rgba(192, 54, 44, 0.1)';
        yorumBox.style.color = 'var(--hc-front-red)';
    } else if (toplamPuan === 1) {
        yorumBox.innerHTML = '<strong>HAFİF RİSK.</strong><br>1 "Evet" cevabı alkol kullanımı ile ilgili bazı endişeleri gösterir. Alkol alışkanlıklarınızı gözden geçirmeniz faydalı olabilir.';
        yorumBox.style.background = 'rgba(201, 137, 5, 0.1)';
        yorumBox.style.color = 'var(--hc-front-gold)';
    } else {
        yorumBox.innerHTML = '<strong>DÜŞÜK RİSK.</strong><br>Verilen cevaplar alkol bağımlılığı açısından düşük riskli bir tablo çizmektedir.';
        yorumBox.style.background = 'rgba(15, 138, 95, 0.1)';
        yorumBox.style.color = 'var(--hc-front-green)';
    }

    document.getElementById('hc-cage-alkol-testi-result').classList.add('visible');
}
