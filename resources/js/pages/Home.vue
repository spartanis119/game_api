<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import {Github , Play} from 'lucide-vue-next';
import { Button } from '@/components/ui/button';
import {
    NavigationMenu,
    NavigationMenuContent,
    NavigationMenuItem,
    NavigationMenuLink,
    NavigationMenuList,
    NavigationMenuTrigger,
} from '@/components/ui/navigation-menu'

import games from '@/routes/games';
import home from '@/routes/home';
</script>

<template>
    <div>
        <div class="min-h-screen relative overflow-hidden">
            <!-- <div class="absolute -top-40 -left-40 w-[500px] h-[500px] bg-purple-500/30 rounded-full blur-3xl"></div> -->

            <!-- <div class="absolute top-40 -right-40 w-[500px] h-[500px] bg-orange-500/30 rounded-full blur-3xl"></div> -->
            <div
                class="absolute top-1/2 left-1/2 -translate-x-[40%] -translate-y-[30%] w-[800px] h-[400px] bg-orange-600/30 rounded-full blur-3xl">
            </div>
            <!-- <div
                class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[1000px] h-[600px] bg-orange-300/30 rounded-full blur-3xl">
            </div> -->

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

                <main class="w-10/12 mx-auto py-45 px-30">
                    <div class="w-7/12">
                        <h1 class="text-6xl font-bold">
                            Descubre todos los juegos que más he jugado este 2026.
                        </h1>
                    </div>
                    <div class="w-7/12 my-5">
                        <h2 class="text-xl text-muted-foreground ">
                            Explora estadísticas, personajes favoritos y datos de mis partidas en juegos como League of Legends, Valorant y Pokémon, obtenidos a través de APIs integradas en esta aplicación web.
                        </h2>
                    </div>
                    <div class="w-7/12 my-5">
                        <Button class="mr-3" :as="Link" :href="games.lol().url"><Play/>¡Dale play!</Button>
                        <Button><Github/> Github</Button>
                    </div>
                </main>

            </div>
        </div>
    </div>
</template>
