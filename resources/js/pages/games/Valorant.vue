<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import {
    Accordion,
    AccordionContent,
    AccordionItem,
    AccordionTrigger,
} from '@/components/ui/accordion'
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
import type { ValorantPageProps } from '@/types/valorant';
const props = defineProps<ValorantPageProps>();

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
                        Valorant
                    </h1>
                </div>
                <article class="my-10">
                    <h2 class="text-2xl font-bold mb-5">¿Qué es?</h2>
                    <p>Valorant es un videojuego multijugador en línea del género shooter táctico en primera persona
                        (FPS), desarrollado por Riot Games y lanzado en 2020. Se caracteriza por combinar la precisión
                        de los disparos típica de los juegos de disparos con habilidades únicas de cada personaje, lo
                        que añade una capa estratégica adicional.
                    </p>
                    <br>
                    <p> En Valorant, dos equipos de cinco jugadores se enfrentan en diferentes mapas con un objetivo
                        claro: uno de los equipos debe plantar un dispositivo llamado “Spike”, mientras que el otro debe
                        impedirlo o desactivarlo. Cada jugador controla a un “agente”, personaje con habilidades
                        especiales que pueden usarse para atacar, defender o apoyar al equipo.</p>
                    <br>
                    <p>El juego destaca por su enfoque competitivo, donde la comunicación, la puntería y la estrategia
                        son fundamentales. Además, cuenta con una escena de esports en crecimiento, atrayendo tanto a
                        jugadores profesionales como a una gran comunidad de fans alrededor del mundo.</p>
                </article>
                <article class="my-10">
                    <h2 class="text-2xl font-bold mb-5">¿Cómo se juega?</h2>
                    <p>En Valorant, las partidas se desarrollan por rondas. Al inicio de cada ronda, los jugadores
                        compran armas y habilidades utilizando créditos obtenidos durante la partida. Luego, los equipos
                        se dividen en atacantes y defensores.
                    </p>
                    <br>
                    <p>El equipo atacante tiene como objetivo plantar el Spike en uno de los sitios designados del mapa.
                        Una vez plantado, deben protegerlo hasta que detone. Por otro lado, el equipo defensor debe
                        evitar que el Spike sea plantado o desactivarlo si ya ha sido colocado.</p>
                    <br>
                    <p>Cada agente tiene habilidades únicas que influyen en el desarrollo de la partida, como crear
                        barreras, revelar la posición de los enemigos o lanzar habilidades ofensivas. Sin embargo, a
                        diferencia de otros juegos, la puntería y el control de las armas siguen siendo elementos clave
                        para ganar.</p>
                    <br>
                    <p>El equipo que gana más rondas (generalmente 13) se lleva la victoria. Para lograrlo, es esencial
                        la coordinación, el uso inteligente de habilidades y la capacidad de adaptarse a las estrategias
                        del equipo contrario.</p>
                </article>
                <article>
                    <h2 class="text-2xl font-bold mb-5 text-center">Agentes para principiantes</h2>
                    <div class="w-full flex">
                        <div v-for="agent in easyAgents" :key="agent.name" class="w-3/12">
                            <h3 class="text-center mt-10 font-bold">{{ agent.role }}</h3>
                            <img :src="`${agent.image}`" :alt="agent.name">
                            <h3 class="text-center mt-10 font-bold">{{ agent.name }}</h3>
                        </div>
                    </div>
                </article>
                <article class="my-20">
                    <h2 class="text-2xl font-bold mb-5 text-center">Mis Agentes Favoritos</h2>
                    <Accordion type="single" collapsible class="my-5">
                        <AccordionItem v-for="agent in myFavoriteAgents" :key="agent.name" :value="agent.name">
                            <AccordionTrigger>
                                <div class="flex items-center gap-3">
                                    <span>{{ agent.name }}</span>
                                </div>
                            </AccordionTrigger>
                            <AccordionContent>
                                <div class="w-full flex">
                                    <div class="w-2/12 flex items-center">
                                        <img :src="`${agent.image}`" :alt="agent.name">
                                    </div>
                                    <div class="w-10/12 ps-10">
                                        <h2 class="font-bold mb-2 text-center">{{ agent.role }}</h2>
                                        <h2 class="font-bold mb-2">{{ agent.name }}</h2>
                                        <p class="text-muted-foreground font-medium mb-4 text-sm">{{ agent.description
                                        }}</p>
                                        <h3 class="font-medium mb-2">Habilidades</h3>
                                        <div v-if="agent.abilities?.passive?.name">
                                            <h4 class="mb-2 text-sm"><b>Pasiva:</b> {{ agent.abilities?.passive?.name }}
                                            </h4>
                                            <p class="text-muted-foreground mb-4 font-medium text-sm">
                                                {{ agent.abilities?.passive?.description }}</p>
                                        </div>
                                        <h4 class="mb-2 text-sm"><b>C:</b> {{ agent.abilities.c.name }}</h4>
                                        <p class="text-muted-foreground mb-4 font-medium text-sm">
                                            {{ agent.abilities.c.description }}</p>
                                        <h4 class="mb-2 text-sm"><b>Q:</b> {{ agent.abilities.q.name }}</h4>
                                        <p class="text-muted-foreground mb-4 font-medium text-sm">
                                            {{ agent.abilities.q.description }}</p>
                                        <h4 class="mb-2 text-sm"><b>E:</b> {{ agent.abilities.e.name }}</h4>
                                        <p class="text-muted-foreground mb-4 font-medium text-sm">
                                            {{ agent.abilities.e.description }}</p>
                                        <h4 class="mb-2 text-sm"><b>X:</b> {{ agent.abilities.x.name }}</h4>
                                        <p class="text-muted-foreground mb-4 font-medium text-sm">
                                            {{ agent.abilities.x.description }}</p>
                                    </div>
                                </div>
                            </AccordionContent>
                        </AccordionItem>
                    </Accordion>
                </article>
                <article class="my-20">
                    <h2 class="text-2xl font-bold mb-5 text-center">Mis armas favoritas</h2>
                    <div class="w-full flex mt-20">
                        <div v-for="weapon in myFavoriteWeapons" :key="weapon.name" class="w-3/12">
                            <img :src="`${weapon.image}`" :alt="weapon.name">
                            <h3 class="text-center mt-10 font-bold">{{ weapon.name }}</h3>
                        </div>
                    </div>
                </article>
                <article class="my-20">
                    <h2 class="text-2xl font-bold mb-5 text-center">Mis mapas favoritos</h2>
                    <div class="w-full flex flex-wrap mt-20">
                        <div v-for="map in myFavoriteMaps" :key="map.name" class="w-6/12 px-5">
                            <h3 class="text-center mt-10 font-bold">{{ map.name }}</h3>
                            <img :src="`${map.image}`" :alt="map.name">
                        </div>
                    </div>
                </article>
            </main>
        </div>
    </div>

</template>
