import { Box, Heading, Text, Icon, Link, Flex } from "@chakra-ui/react";
import React from "react";
import { IconType } from "react-icons";
import { BsSearch } from "react-icons/bs";

export const ServiceCard = ({
    icon,
    heading,
    description
}: {
    icon: IconType;
    heading: string;
    description: string;
}) => {
    return (
        <Flex
            flexDirection="column"
            bg="blue.50"
            p="40px"
            w="full"
            height="380px"
            justifyContent="space-between"
        >
            <Icon h={20} w={20} as={icon} />
            <Box>
                <Heading color="blue.800" fontSize={20} letterSpacing="3px" pb="20px">{heading}</Heading>
                <Text color="blue.700">{description}</Text>
            </Box>
            <Link color="blue.800">
                <Icon as={BsSearch} color="brand.100" mr="10px" h={5} w={5} />Saiba Mais
            </Link>
        </Flex>)
}; 