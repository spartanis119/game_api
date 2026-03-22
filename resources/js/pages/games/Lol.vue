<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { ref } from 'vue';
import {
    Accordion,
    AccordionContent,
    AccordionItem,
    AccordionTrigger,
} from '@/components/ui/accordion'
import { Card, CardContent } from '@/components/ui/card'
import { Carousel, CarouselContent, CarouselItem, CarouselNext, CarouselPrevious } from '@/components/ui/carousel'
import {
    NavigationMenu,
    NavigationMenuContent,
    NavigationMenuItem,
    NavigationMenuLink,
    NavigationMenuList,
    NavigationMenuTrigger,
} from '@/components/ui/navigation-menu';
import games from '@/routes/games';
import home from '@/routes/home';
import type { LolPageProps } from '@/types/lol';


interface LaneChampion {
    name: string
    image: string
}

interface Lane {
    label: string
    champions: LaneChampion[]
}

const lanes: Lane[] = [
    {
        label: 'Top',
        champions: [
            { name: 'Darius', image: '/img/Darius_0.jpg' },
            { name: 'Garen', image: '/img/Garen_0.jpg' },
            { name: 'Malphite', image: '/img/Malphite_0.jpg' },
        ]
    },
    {
        label: 'Mid',
        champions: [
            { name: 'Annie', image: '/img/Annie_0.jpg' },
            { name: 'Lux', image: '/img/Lux_0.jpg' },
            { name: 'Veigar', image: '/img/Veigar_0.jpg' },
        ]
    },
    {
        label: 'Bot',
        champions: [
            { name: 'Ashe', image: '/img/Ashe_0.jpg' },
            { name: 'Miss Fortune', image: '/img/MissFortune_0.jpg' },
            { name: "Sivir", image: '/img/Sivir_0.jpg' },
        ]
    },
    {
        label: 'Support',
        champions: [
            { name: 'Soraka', image: '/img/Soraka_0.jpg' },
            { name: 'Lulu', image: '/img/Lulu_0.jpg' },
            { name: 'Janna', image: '/img/Janna_0.jpg' },
        ]
    },
    {
        label: 'Jungle',
        champions: [
            { name: 'Warwick', image: '/img/Warwick_0.jpg' },
            { name: 'Amumu', image: '/img/Amumu_0.jpg' },
            { name: 'Hecarim', image: '/img/Hecarim_0.jpg' },
        ]
    },
]
// Un ref de current por cada lane
const currentSlides = ref<Record<string, number>>(
    Object.fromEntries(lanes.map(lane => [lane.label, 1]))
)

defineProps<LolPageProps>();

</script>

<template>
    <div class="min-h-screen relative overflow-hidden">
        <div class="relative z-10">
            <header class="sticky top-0 z-50 border-b border-white/10">
                <nav class="w-10/12 mx-auto h-16 flex items-center">
                    <NavigationMenu>
                        <NavigationMenuList>
                            <NavigationMenuItem>
                                <NavigationMenuLink as-child>
                                    <Link :href="home.index().url" class="font-medium">
                                        Home
                                    </Link>
                                </NavigationMenuLink>
                            </NavigationMenuItem>
                            <NavigationMenuItem>
                                <NavigationMenuTrigger>Mis favoritos</NavigationMenuTrigger>
                                <NavigationMenuContent>
                                    <ul class="grid w-[400px] gap-2 md:w-[500px] md:grid-cols-2 lg:w-[600px]">

                                        <NavigationMenuLink as-child>
                                            <Link :href="games.lol().url">
                                                <div class="flex items-center gap-2 font-medium">
                                                    <img src="/icons/lol.png" width="32px" height="20px"
                                                        alt="League of Legends"> League of Legends
                                                </div>
                                                <div class="text-muted-foreground">
                                                    League of Legends es un juego de estrategia por equipos en el
                                                    que
                                                    dos
                                                    equipos de cinco campeones se enfrentan para ver quién destruye
                                                    antes la
                                                    base del otro.
                                                </div>
                                            </Link>
                                        </NavigationMenuLink>


                                        <NavigationMenuLink as-child>
                                            <Link :href="games.valorant().url">
                                                <div class="flex items-center gap-2 font-medium">
                                                    <img src="/icons/valorant.png" width="20px" height="20px"
                                                        alt="Valorant">
                                                    Valorant
                                                </div>
                                                <div class="text-muted-foreground">
                                                    Valorant es un juego de disparos en primera persona con
                                                    habilidades
                                                    de
                                                    personajes únicas en el que dos equipos de cinco jugadores se
                                                    enfrentan
                                                    para lograr objetivos específicos.
                                                </div>
                                            </Link>
                                        </NavigationMenuLink>

                                        <NavigationMenuLink as-child>
                                            <Link :href="games.pokemon().url">
                                                <div class="flex items-center gap-2 font-medium">
                                                    <img src="/icons/pokemon.png" width="20px" height="20px"
                                                        alt="Pokemon">
                                                    Pokemon
                                                </div>
                                                <div class="text-muted-foreground">
                                                    Pokemon es un juego de rol en el que los jugadores controlan a
                                                    sus
                                                    propios pokemon y se enfrentan a otros entrenadores.
                                                </div>
                                            </Link>
                                        </NavigationMenuLink>
                                    </ul>
                                </NavigationMenuContent>
                            </NavigationMenuItem>
                            <NavigationMenuItem>
                                <NavigationMenuItem>
                                    <NavigationMenuLink as-child>
                                        <Link :href="home.index().url" class="font-medium">
                                            Contacto
                                        </Link>
                                    </NavigationMenuLink>
                                </NavigationMenuItem>
                            </NavigationMenuItem>
                        </NavigationMenuList>
                    </NavigationMenu>
                </nav>
            </header>

            <main class="w-10/12 mx-auto mt-10">
                <div class="text-center w-full">
                    <h1 class="text-5xl font-bold">
                        League of Legends
                    </h1>
                </div>
                <article class="my-10">
                    <h2 class="text-2xl font-bold mb-5">¿Qué es?</h2>
                    <p>League of Legends (LoL) es un videojuego multijugador en línea del género MOBA (Multiplayer
                        Online Battle Arena), desarrollado por Riot Games. Desde su lanzamiento en 2009, se ha
                        convertido en uno de los títulos más populares del mundo, tanto a nivel casual como competitivo.
                    </p>
                    <br>
                    <p> En LoL, dos equipos de cinco jugadores se enfrentan en un mapa llamado la Grieta del Invocador.
                        Cada jugador controla a un personaje conocido como “campeón”, el cual posee habilidades únicas,
                        estilos de juego diferentes y roles específicos dentro del equipo. El objetivo principal es
                        destruir el nexo del equipo enemigo, una estructura ubicada en su base.</p>
                    <br>
                    <p>El juego combina estrategia, habilidad mecánica y trabajo en equipo. No se trata solo de
                        eliminar enemigos, sino de tomar decisiones inteligentes, controlar recursos y coordinarse con
                        los compañeros. Además, cuenta con una escena de esports muy desarrollada, con torneos
                        internacionales que reúnen a millones de espectadores.</p>
                </article>
                <article class="my-10">
                    <h2 class="text-2xl font-bold mb-5">¿Cómo se juega?</h2>
                    <p>En League of Legends, cada partida comienza con la selección de campeones. Los jugadores eligen
                        un personaje según el rol que desean cumplir: puede ser atacante, defensor, apoyo, entre otros.
                        Una vez dentro de la partida, los equipos aparecen en lados opuestos del mapa.
                    </p>
                    <br>
                    <p>El mapa principal está dividido en tres líneas (superior, central e inferior) y una jungla. En
                        cada línea, los jugadores avanzan junto a oleadas de súbditos controlados por la computadora,
                        enfrentándose a los enemigos para ganar experiencia y oro. Este oro permite comprar objetos que
                        mejoran las habilidades del campeón.</p>
                    <br>
                    <p>Durante la partida, los jugadores deben tomar decisiones constantes: cuándo atacar, cuándo
                        defender, cuándo ayudar a un compañero o cuándo asegurar objetivos importantes como dragones o
                        el Barón Nashor, que otorgan ventajas al equipo.</p>
                    <br>
                    <p> El juego termina cuando uno de los equipos logra destruir el nexo enemigo. Para conseguirlo, es
                        fundamental la coordinación, la comunicación y la capacidad de adaptarse a cada situación dentro
                        de
                        la partida.</p>
                </article>
                <article>
                    <h2 class="text-2xl font-bold mb-5">¿Cuáles campeones son fáciles para cada línea?</h2>

                    <div class="w-full flex gap-4 my-20 justify-center flex-wrap">

                        <div v-for="lane in lanes" :key="lane.label" class="flex flex-col items-center gap-2">
                            <Carousel orientation="vertical" class="relative w-60" :opts="{ align: 'start' }"
                                @init-api="(api: any) => api.on('select', () => currentSlides[lane.label] = api.selectedScrollSnap() + 1)">
                                <CarouselContent class="h-90">
                                    <CarouselItem v-for="champion in lane.champions" :key="champion.name" class="p-1">
                                        <Card>
                                            <CardContent class="flex flex-col items-center justify-center p-3 gap-2" >
                                                <span class="font-bold">{{ lane.label }}</span>
                                                <img :src="champion.image" :alt="champion.name">
                                                <span class="text-sm font-medium text-center">{{ champion.name }}</span>
                                            </CardContent>
                                        </Card>
                                    </CarouselItem>
                                </CarouselContent>

                                <CarouselPrevious />
                                <CarouselNext />
                            </Carousel>

                        </div>
                    </div>
                </article>
                <article class="mt-10 mb-20">
                    <h2 class="text-2xl font-bold mb-5">¿Cuáles son mis campeones favoritos?</h2>
                    <Accordion type="single" collapsible class="my-5">
                        <AccordionItem v-for="champion in myChampionsData" :key="champion.championInfo.name"
                            :value="champion.championInfo.name">
                            <AccordionTrigger>
                                <div class="flex items-center gap-3">
                                    <span>{{ champion.championInfo.name }}</span>
                                </div>
                            </AccordionTrigger>
                            <AccordionContent>
                                <div class="w-full flex">
                                    <div class="w-2/12 flex items-center">
                                        <img :src="`/img/${champion.championInfo.name}_0.jpg`"
                                            :alt="`League of Legends - ${champion.championInfo.name}`">
                                    </div>
                                    <div class="w-10/12 ps-10">
                                        <h2 class="text-muted-foreground font-medium mb-2">{{
                                            champion.championInfo.title }}</h2>
                                        <h3 class="font-medium mb-2">Lore</h3>
                                        <p class="text-muted-foreground font-medium mb-4">{{ champion.championInfo.lore
                                            }}</p>
                                        <h3 class="font-medium mb-2">Habilidades</h3>
                                        <h4 class="mb-2 "><b>Pasiva:</b> {{champion.championInfo.habilities.passive.name }}</h4>
                                        <h4 class="mb-2 "><b>Q:</b> {{ champion.championInfo.habilities.q.name }}</h4>
                                        <p class="mb-2 text-muted-foreground font-medium">{{
                                            champion.championInfo.habilities.q.description }}</p>
                                        <h4 class="mb-2"><b>W:</b> {{ champion.championInfo.habilities.w.name }}</h4>
                                        <p class="mb-2 text-muted-foreground font-medium">{{
                                            champion.championInfo.habilities.w.description }}</p>
                                        <h4 class="mb-2"><b>E:</b> {{ champion.championInfo.habilities.e.name }}</h4>
                                        <p class="mb-2 text-muted-foreground font-medium">{{
                                            champion.championInfo.habilities.e.description }}</p>
                                        <h4 class="mb-2"><b>R:</b> {{ champion.championInfo.habilities.r.name }}</h4>
                                        <p class="mb-5 text-muted-foreground font-medium">{{
                                            champion.championInfo.habilities.r.description }}</p>
                                        <h3 class="font-medium mb-2">Mis estadísticas</h3>
                                        <p class="text-muted-foreground font-medium">Nivel: {{ champion.championLevel }}
                                        </p>
                                        <p class="text-muted-foreground font-medium">Maestria: {{
                                            champion.requireGradeCounts }}</p>
                                        <p class="text-muted-foreground font-medium">Puntos de maestria: {{
                                            champion.championPoints }}</p>
                                    </div>
                                </div>
                            </AccordionContent>
                        </AccordionItem>
                    </Accordion>
                </article>
                 <article>
                    <h2 class="text-2xl font-bold mb-5 text-center">Cuenta personal</h2>
                    <div class="w-full flex mt-10 mb-20">
                        <div class="w-6/12 flex justify-end pe-20">
                            <img :src="`/img/${profile.profileIconId}.png`" :alt="`League of Legends - ${profile.name}`"
                                class="w-50 h-50 rounded-full">
                        </div>
                        <div class="w-6/12 ps-10">
                            <h3 class="font-medium mb-2">Invocador</h3>
                            <p class="text-muted-foreground font-medium mb-4">{{ profile.name }}</p>
                            <h3 class="font-medium mb-2">Codigo</h3>
                            <p class="text-muted-foreground font-medium mb-4"># {{ profile.code }}</p>
                            <h3 class="font-medium mb-2">Nivel</h3>
                            <p class="text-muted-foreground font-medium mb-4">{{ profile.level }}</p>
                        </div>
                    </div>
                </article>
            </main>
        </div>
    </div>

</template>
