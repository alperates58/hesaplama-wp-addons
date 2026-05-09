function hcGezegenEtkiGoster() {
    const p = document.getElementById('hc-p-sel').value;
    const data = {
        "Güneş": "Güneş, astrolojide sizin ana kimliğinizi, egonuzu, yaşam enerjinizi ve temel karakterinizi temsil eder. Haritanızda parladığınız alanı ve 'ben buradayım' dediğiniz noktayı gösterir. Babayı ve otorite figürlerini de simgeler.",
        "Ay": "Ay, duygularınızı, bilinçaltınızı, alışkanlıklarınızı ve içsel güvenliğinizi yönetir. Nasıl hissettiğinizi, nasıl beslendiğinizi ve duygusal olarak nelere ihtiyaç duyduğunuzu gösterir. Anneyi ve kökleri simgeler.",
        "Merkür": "Merkür, zihin kapasitenizi, iletişim tarzınızı, öğrenme biçiminizi ve mantığınızı temsil eder. Nasıl konuştuğunuzu, nasıl düşündüğünüzü ve bilgiyi nasıl işlediğinizi Merkür yerleşiminizden anlarız.",
        "Venüs": "Venüs, aşkı, ilişkileri, estetik değerleri, maddi kaynakları ve hayattan aldığınız keyfi simgeler. Neleri sevdiğinizi, nasıl bir partner olduğunuzu ve neleri değerli bulduğunuzu gösterir.",
        "Mars": "Mars, enerjinizi, mücadele gücünüzü, tutkunuzu ve hayatta nasıl harekete geçtiğinizi temsil eder. Karar verme ve uygulama yeteneğinizi, öfke yönetiminizi ve rekabet tarzınızı gösterir.",
        "Jüpiter": "Jüpiter, şansı, bolluğu, genişlemeyi, felsefeyi ve inançları simgeler. Hayatın neresinde korunduğunuzu, nerede büyüdüğünüzü ve hayata hangi pencereden baktığınızı gösterir.",
        "Satürn": "Satürn, disiplini, sorumluluğu, sınırları, hayat derslerini ve olgunlaşmayı temsil eder. Nerede zorlandığınızı, nerede ustalaşmanız gerektiğini ve karma yüklerinizi gösterir."
    };

    document.getElementById('hc-p-val').innerText = p;
    document.getElementById('hc-p-desc').innerText = data[p];
    document.getElementById('hc-p-result').classList.add('visible');
}
