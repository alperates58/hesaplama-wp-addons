function hcCinBurcuYiliHesapla() {
    const birthdateInput = document.getElementById('hc-cby-birthdate').value;
    if (!birthdateInput) {
        alert('Lütfen doğum tarihinizi girin.');
        return;
    }

    const birthDate = new Date(birthdateInput);
    const year = birthDate.getFullYear();

    // Chinese New Year Start Dates (Simplified but covers common range 1920-2030)
    // For extreme precision, a full table is used.
    const cnyDates = {
        1920: "1920-02-20", 1921: "1921-02-08", 1922: "1922-01-28", 1923: "1923-02-16", 1924: "1924-02-05",
        1925: "1925-01-24", 1926: "1926-02-13", 1927: "1927-02-02", 1928: "1928-01-23", 1929: "1929-02-10",
        1930: "1930-01-30", 1931: "1931-02-17", 1932: "1932-02-06", 1933: "1933-01-26", 1934: "1934-02-14",
        1935: "1935-02-04", 1936: "1936-01-24", 1937: "1937-02-11", 1938: "1938-01-31", 1939: "1939-02-19",
        1940: "1940-02-08", 1941: "1941-01-27", 1942: "1942-02-15", 1943: "1943-02-05", 1944: "1944-01-25",
        1945: "1945-02-13", 1946: "1946-02-02", 1947: "1947-01-22", 1948: "1948-02-10", 1949: "1949-01-29",
        1950: "1950-02-17", 1951: "1951-02-06", 1952: "1952-01-27", 1953: "1953-02-14", 1954: "1954-02-03",
        1955: "1955-01-24", 1956: "1956-02-12", 1957: "1957-01-31", 1958: "1958-02-18", 1959: "1959-02-08",
        1960: "1960-01-28", 1961: "1961-02-15", 1962: "1962-02-05", 1963: "1963-01-25", 1964: "1964-02-13",
        1965: "1965-02-02", 1966: "1966-01-21", 1967: "1967-02-09", 1968: "1968-01-30", 1969: "1969-02-17",
        1970: "1970-02-06", 1971: "1971-01-27", 1972: "1972-02-15", 1973: "1973-02-03", 1974: "1974-01-23",
        1975: "1975-02-11", 1976: "1976-01-31", 1977: "1977-02-18", 1978: "1978-02-07", 1979: "1979-01-28",
        1980: "1980-02-16", 1981: "1981-02-05", 1982: "1982-01-25", 1983: "1983-02-13", 1984: "1984-02-02",
        1985: "1985-02-20", 1986: "1986-02-09", 1987: "1987-01-29", 1988: "1988-02-17", 1989: "1989-02-06",
        1990: "1990-01-27", 1991: "1991-02-15", 1992: "1992-02-04", 1993: "1993-01-23", 1994: "1994-02-10",
        1995: "1995-01-31", 1996: "1996-02-19", 1997: "1997-02-07", 1998: "1998-01-28", 1999: "1999-02-16",
        2000: "2000-02-05", 2001: "2001-01-24", 2002: "2002-02-12", 2003: "2003-02-01", 2004: "2004-01-22",
        2005: "2005-02-09", 2006: "2006-01-29", 2007: "2007-02-18", 2008: "2008-02-07", 2009: "2009-01-26",
        2010: "2010-02-14", 2011: "2011-02-03", 2012: "2012-01-23", 2013: "2013-02-10", 2014: "2014-01-31",
        2015: "2015-02-19", 2016: "2016-02-08", 2017: "2017-01-28", 2018: "2018-02-16", 2019: "2019-02-05",
        2020: "2020-01-25", 2021: "2021-02-12", 2022: "2022-02-01", 2023: "2023-01-22", 2024: "2024-02-10",
        2025: "2025-01-29", 2026: "2026-02-17", 2027: "2027-02-06", 2028: "2028-01-26", 2029: "2029-02-13",
        2030: "2030-02-03"
    };

    let effectiveYear = year;
    const cnyThisYear = cnyDates[year] ? new Date(cnyDates[year]) : new Date(year, 0, 30); // Fallback to Jan 30
    
    if (birthDate < cnyThisYear) {
        effectiveYear = year - 1;
    }

    const animals = [
        { name: "Fare", traits: "Akıllı, uyumlu ve cana yakın. Fare burcu insanları zekaları ve fırsatları değerlendirme yetenekleriyle tanınırlar." },
        { name: "Öküz", traits: "Güvenilir, sabırlı ve çalışkan. Öküz burcu insanları azimli ve kararlı yapılarıyla her türlü zorluğun üstesinden gelirler." },
        { name: "Kaplan", traits: "Cesur, enerjik ve lider ruhlu. Kaplanlar macerayı severler ve girdikleri her ortamda dikkatleri üzerine çekerler." },
        { name: "Tavşan", traits: "Zarif, nazik ve hassas. Tavşan burçları barışçıl doğaları ve sanata olan yatkınlıklarıyla bilinirler." },
        { name: "Ejderha", traits: "Güçlü, gururlu ve karizmatik. Ejderhalar Çin astrolojisinin en şanslı burcu kabul edilir, büyük idealleri vardır." },
        { name: "Yılan", traits: "Bilge, gizemli ve sezgisel. Yılan burcu insanları derin düşünürler ve çevrelerindeki olayları çok iyi analiz ederler." },
        { name: "At", traits: "Özgür ruhlu, enerjik ve bağımsız. At burçları gezmeyi severler ve bitmek bilmeyen bir yaşam enerjisine sahiptirler." },
        { name: "Keçi", traits: "Yaratıcı, şefkatli ve zarif. Keçi burcu insanları duygusal derinlikleri ve estetik bakış açılarıyla öne çıkarlar." },
        { name: "Maymun", traits: "Eğlenceli, zeki ve meraklı. Maymunlar problem çözme yetenekleri ve neşeli tavırlarıyla sosyal ortamlarda çok sevilirler." },
        { name: "Horoz", traits: "Dürüst, titiz ve yetenekli. Horoz burçları planlı yaşamayı severler ve kendilerine güvenleri oldukça yüksektir." },
        { name: "Köpek", traits: "Sadık, koruyucu ve adil. Köpek burcu insanları dürüstlükleri ve sevdiklerine olan bağlılıklarıyla tanınırlar." },
        { name: "Domuz", traits: "Cömert, hoşgörülü ve dürüst. Domuz burçları yaşamdan keyif almayı bilirler ve çok iyi birer dostturlar." }
    ];

    // Base year 1900 was a Rat (Fare) year. 1900 % 12 = 4
    // Fare is index 0. (Year - 1900) % 12. If index is negative, add 12.
    let index = (effectiveYear - 1900) % 12;
    if (index < 0) index += 12;

    const myAnimal = animals[index];

    document.getElementById('hc-cby-name').innerText = myAnimal.name;
    document.getElementById('hc-cby-details').innerHTML = `<p>${myAnimal.traits}</p><p><strong>${effectiveYear}</strong> yılı Çin Takvimine göre <strong>${myAnimal.name}</strong> yılıdır.</p>`;
    document.getElementById('hc-cin-burcu-yili-result').classList.add('visible');
}
